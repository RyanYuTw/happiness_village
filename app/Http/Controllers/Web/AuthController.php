<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class AuthController extends Controller
{
    /**
     * User login
     */
    public function login()
    {
//        Session::put('auth_type', $type);

        return view('auth.login');

//        return match ($type) {
//            'line' => Redirect::to($this->getLineAuthUrl()),
//            'facebook', 'google' => Socialite::driver($type)->redirect(),
//            default => Redirect::to('/'),
//        };
    }

    /**
     * OAuth2 call back process
     * @param Request $request
     * @return void
     * @throws Exception
     */
    public function callback(Request $request): void
    {
        $user = null;
        $type = Session::get('auth_type');
        switch ($type) {
            case 'facebook':
            case 'google':
                $user = Socialite::driver($type)->stateless()->user();
                break;
            case 'line':
                $token = $this->getLineAuthToken($request);
                $user = $this->getLineUserProfile($token);
                $user['token'] = $token;
                $user = (object)$user;
                break;
            default:
                // do nothing
        }

        if ($user) {
            $this->syncUser($user);
        }
    }

    /**
     * Sync user data to database
     * @param $user
     * @return void
     */
    public function syncUser($user): void
    {
        $type = Session::get('auth_type');

        $userId = ($type == 'line') ? $user->userId : $user->id;
        $displayName = ($type == 'line') ? $user->displayName : $user->name;
        $avatar =  ($type == 'line') ? $user->pictureUrl : $user->avatar;
        $token = $user->token;
        $expiresIn = $user->expiresIn ?? 0;

        dump($user);

        // TODO: sync user data to database

        Session::forget('auth_type');
    }


    /**
     * Redirect to Line login pageååå
     * @return string
     */
    protected function getLineAuthUrl(): string
    {
        $state = Str::random(10);
        $nonce = Str::random(8);
        $param = [
            'response_type' => 'code',
            'client_id' => config('services.line.client_id'),
            'redirect_uri' => config('services.line.redirect'),
            'state' => $state,
            'scope' => 'profile openid email',
            'nonce' => $nonce,
        ];
        return 'https://access.line.me/oauth2/v2.1/authorize?' . http_build_query($param);

    }

    /**
     * Get Line access token
     * @param Request $request
     * @return string
     */
    protected function getLineAuthToken(Request $request): string
    {
        $token = '';

        // check error
        if ($request->input('error')) {
            Log::error("Line login error: " . $request->input('error')
                . " # Description: " . $request->input('error_description'));
            return $token;
        }

        // get access token
        $code = $request->input('code');
        if ($code) {
            try {
                $response = Http::withHeaders(
                    [
                        'Content-Type' => 'application/x-www-form-urlencoded'
                    ]
                )
                    ->asForm()
                    ->post('https://api.line.me/oauth2/v2.1/token', [
                        'grant_type' => 'authorization_code',
                        'code' => $code,
                        'redirect_uri' => config('services.line.redirect'),
                        'client_id' => config('services.line.client_id'),
                        'client_secret' => config('services.line.client_secret'),
                    ])->json();

                $token = $response['access_token'] ?? '';
            } catch (Throwable $t) {
                Log::error("Line login error: " . $t->getFile() . " " . $t->getLine() . " " . $t->getMessage());
            }
        }
        return $token;
    }

    /**
     * Get Line user's profile
     * @param string $token
     * @return array
     * @throws Exception
     */
    protected function getLineUserProfile(string $token): array
    {
        $profile = [];
        try {
            $profile = Http::withHeaders(
                [
                    'Authorization' => "Bearer $token"
                ]
            )->get('https://api.line.me/v2/profile')->json();

            if (!$profile) {
                throw new Exception("Error: profile not found!");
            }
        } catch (Throwable $t) {
            Log::error("Line login error: " . $t->getFile() . " " . $t->getLine() . " " . $t->getMessage());
        }
        return $profile;
    }

}

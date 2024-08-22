<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ActivityController extends Controller
{
    /**
     * register form
     * @return Factory|View|Application|void
     */
    public function signUp()
    {
        try {
            $config = config('cities');
            $cities = [];
            if (count($config)) {
                foreach ($config as $city) {
                    $cities[$city['code']] = $city['name'];
                }
            }

            $binding = [
                'cities' => $cities,
            ];
            return view('activities.register', $binding);
        } catch (NotFoundHttpException $e) {
            Log::info("catch Throwable: " . $e->getLine() . ";" . $e->getMessage() . ";" . $e->getFile());
            abort(404);
        } catch (Throwable $t) {
            Log::error($t->getMessage() . ' ' . $t->getFile() . $t->getLine());
            abort(500);
        }
    }

    /**
     * register data processing
     * @return void
     */
    public function register(Request $request)
    {
        try {
            dump($request->all(), $request->input('name'));
        } catch (Throwable $t) {
            dd($t);
            Log::error($t->getMessage() . ' ' . $t->getFile() . $t->getLine());
            abort(500);
        }

    }
}

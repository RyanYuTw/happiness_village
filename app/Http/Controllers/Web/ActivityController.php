<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ActivityController extends Controller
{
    /**
     * @return Factory|View|Application|void
     */
    public function register()
    {
        try {
            $config = config('cities');
            $cities = [];
            $counties = [];
            if (count($config)) {
                foreach ($config as $city) {
                    $cities[$city['code']] = $city['name'];
                    $counties[$city['code']] = $city['area'];
                }
            }

            $binding = [
                'cities' => $cities,
                'counties' => $counties
            ];
            return view('activities.register', $binding);
        } catch (NotFoundHttpException $e) {
            Log::info("catch Throwable: " . $e->getLine() . ";" . $e->getMessage() . ";" . $e->getFile());
            abort(404);
        } catch (Throwable $t) {
            dd($t);
            Log::error($t->getMessage() . ' ' . $t->getFile() . $t->getLine());
            abort(500);
        }
    }
}

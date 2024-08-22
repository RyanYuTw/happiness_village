<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

class CityController extends Controller
{
    /**
     * get county date by city code
     * @param Request $request
     * @return JsonResponse
     */
    public function county(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'city_code' => 'required|max:5',
            ]);
            if ($validator->fails()) {
                throw new ValidationException(
                    $validator,
                    [
                        'status' => false,
                        'message' => implode(';', collect($validator->getMessageBag())->collapse()->toArray()),
                        'data' => [
                            'output' => '抱歉，出現錯誤請稍後再試。',
                        ],
                    ]
                );
            }

            $config = config('cities');
            $counties = [];
            if (count($config)) {
                foreach ($config as $city) {
                    if ($city['code'] == $request['city_code']) {
                        $counties = $city['area'];
                        break;
                    }
                }
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'success',
                    'data' => $counties,
                ],
                ResponseAlias::HTTP_OK
            );
        } catch (ValidationException $exception) {
            Log::error($exception->getMessage());
            return response()->json($exception->getResponse(), 400);
        } catch (Throwable $throwable) {
            Log::error($throwable->getMessage());
            return response()->json(
                [
                    'status' => false,
                    'message' => $throwable->getMessage(),
                    'data' => [
                        'output' => '抱歉，出現錯誤請稍後再試。',
                    ],
                ],
                ResponseAlias::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}

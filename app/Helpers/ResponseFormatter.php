<?php

namespace App\Helpers;

class ResponseFormatter
{
    protected static $response = [
        'meta' => [
            'code'    => 200,
            'status'  => 'success',
            'message' => 'null'
        ],
        'data' => null
    ];

    /**
     * json untuk success
     * @param null $data
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data=null, $message=null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;
        return response()->json(self::$response, self::$response['meta']['code']);
    }

    /**
     * json untuk error
     * @param null $data
     * @param null $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($data=null, $message=null, $code=400)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;
        return response()->json(self::$response, self::$response['meta']['code']);
    }
}

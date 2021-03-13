<?php

if (!function_exists('respApiJsonSuccess')) {
    function respApiJsonSuccess($data, $many = false, $code = 201)
    {
        $respData = [
            'version' => config('app.version'),
            'code' => $code,
        ];

        if (!$many) {
            $respData = array_merge($respData, [
                'data' => $data
            ]);
        } else {
            $respData = array_merge($respData, [
                'items' => $data
            ]);
        }

        return response()->json($respData);
    }
}

/**
 * create rest_api error response if doesnt exists
 * @param string|array|object message
 * @param mixed additional data
 * @param integer response code
 * @param integer error code
 * @return Response
 */
if (!function_exists('respApiError')) {
    function respApiError($message, $data = null, $code = 400, $errCode = null, $addHeaders = [])
    {
        $rest   = [
            "version"   => config("api.version"),
            "error" => [
                "code"       => $code,
                "message"    => $message,
            ]
        ];

        if ($errCode)
            $rest['error']['code'] = $errCode;

        if ($data)
            $rest['error']['errors'] = $data;

        return response()
            ->json($rest, $code)
            ->withHeaders($addHeaders);
    }
}

/**
 * create rest_api error response if doesnt exists
 * @param string|array|object message
 * @param mixed additional data
 * @param integer response code
 * @param integer error code
 * @return Response
 */
if (!function_exists('respApiValidationError')) {
    function respApiValidationError($messages, $data = null, $code = 400, $errCode = null, $addHeaders = [])
    {
        $validation = array();

        foreach ($messages->toArray() as $key => $message){
            $validation[$key] = $message[0];
        }

        $rest   = [
            "version"   => config("api.version"),
            "errors" => $validation
        ];

        return response()
            ->json($rest, $code)
            ->withHeaders($addHeaders);
    }
}

if (!function_exists('respApiPaginateJsonSuccess')) {
    function respApiPaginateJsonSuccess($data, $code = 201)
    {
        $respData = [
            'version' => config('app.version'),
            'code' => $code,
            'data' => $data
        ];

        return response()->json($respData);
    }
}

if (!function_exists('respApiServerError')) {
    function respApiServerError()
    {
        $respData = [
            'version' => config('app.version'),
            'message' => 'Server Error'
        ];

        return response()->json($respData, 500);
    }
}

if (!function_exists('respApiXmlSuccess')) {
    function respApiXmlSuccess($data, $many = false, $code = 201)
    {
        $respData = [
            'version' => config('app.version'),
            'code' => $code,
        ];

        if (!$many) {
            $respData = array_merge($respData, [
                'data' => $data
            ]);
        } else {
            $respData = array_merge($respData, [
                'items' => $data
            ]);
        }

        return response()->xml($respData);
    }
}

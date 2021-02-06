<?php

if (!function_exists('respApiJsonSuccess')) {
    function respApiJsonSuccess($data, $many = false, $code = 201)
    {
        // version: string
        // code: numeric
        // data: {}

        // version: string
        // code: numeric
        // items: []

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

if (!function_exists('respApiPaginateJsonSuccess')) {
    function respApiPaginateJsonSuccess($data, $code = 201)
    {
        $respData = [
            'version' => config('app.version'),
            'code' => $code,
        ];

        array_push($respData, $data);

        return response()->json($respData);
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

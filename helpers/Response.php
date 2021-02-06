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

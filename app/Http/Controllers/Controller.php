<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function response($success, $message, $records, $errors = [], $code = 200, $time = null)
    {
        // Calculate response time
        $time = round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2) . " ms";

        // Response structure
        $response =
            [
            "success" => $success,
            "message" => $message,
            "records" => $records,
            "errors" => $errors,
            "code" => $code,
            "time" => $time,
        ];

        return response()->json($response, $code);
    }
}

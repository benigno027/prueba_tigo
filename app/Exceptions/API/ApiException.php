<?php

namespace App\Exceptions\API;

use Exception;
use Illuminate\Http\Response;

class ApiException extends Exception
{
    public $success;
    public $message;
    public $errors = [];
    public $code;

    public function __construct($success, $message, $errors = [], $code = 500)
    {
        $this->success = $success;
        $this->message = $message;
        $this->errors = $errors;
        $this->code = $code;
    }

    public function render()
    {
        $response =
        [
            "success" => $this->success,
            "message" => $this->message,
			"errors" => $this->errors,
			"code" => $this->code,
        ];

        return response()->json($response, $this->code);
    }
}
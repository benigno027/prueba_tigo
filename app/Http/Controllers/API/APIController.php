<?php

namespace App\Http\Controllers\API;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class APIController extends BaseController
{
	use ValidatesRequests;

	protected function response($success, $message, $data, $errors = [], $code = 200, $time = null)
	{
		$time = round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2) . " ms";

		// Make your own structure of the response
		$response['success'] = $success;
		$response['message'] = $message;
		$response['data'] = $data;
		$response['errors'] = $errors;
		$response['code'] = $code;
		$response['time'] = $time;

		return response()->json($response, $code);
	}

	protected function responseError($exception, $records = [], $code = 500)
	{
		$success = false;
		$error = "Error interno del sistema. No ha sido posible completar esta solicitud.";

		// Calculate time
		$time = round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2) . " ms";

		// Response
		$response =
			[
				"success" => $success,
				"message" => $error,
				"records" => $records,
				"errors" => [$error],
				"code" => $code,
				"time" => $time
			];

		return response()->json($response, $code);
	}
}

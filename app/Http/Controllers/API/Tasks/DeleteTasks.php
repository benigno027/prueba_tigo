<?php

namespace App\Http\Controllers\API\Tasks;

use App\Exceptions\API\ApiException;
use App\Http\Controllers\API\APIController;
use App\Services\Task\TaskService;
use Exception;

class DeleteTasks extends APIController
{
    public function __invoke($id)
    {
        try {

            TaskService::destroyTask($id);
            return $this->response(true, "Petición procesada correctamente", [], [], 200);

        } catch (ApiException $e) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        } catch (Exception $exception) {
            return $this->responseError($exception, [], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\API\Tasks;

use App\Exceptions\API\ApiException;
use App\Http\Controllers\API\APIController;
use App\Http\Requests\Tasks\AddTasksFormRequest;
use App\Services\Task\TaskService;
use Exception;

class StoreTasks extends APIController
{
    public function __invoke(AddTasksFormRequest $request)
    {
        try {
            $data = $request->getData();
            $tasks = TaskService::createTask($data);
            return $this->response(true, "Petición procesada correctamente", $tasks, [], 200);
        } catch (ApiException $e) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        } catch (Exception $exception) {
            return $this->responseError($exception, [], 500);
        }
    }
}

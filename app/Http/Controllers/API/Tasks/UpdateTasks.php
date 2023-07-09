<?php

namespace App\Http\Controllers\API\Tasks;

use App\Exceptions\API\ApiException;
use App\Http\Controllers\API\APIController;
use App\Http\Requests\Tasks\EditTasksFormRequest;
use App\Services\Task\TaskService;
use Exception;

class UpdateTasks extends APIController
{
    public function __invoke($id, EditTasksFormRequest $request)
    {
        try {
            $data = $request->getData();
            $task = TaskService::updateTask($id, $data);
            return $this->response(true, "Petición procesada correctamente", $task, [], 200);
        } catch (ApiException $e) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        } catch (Exception $exception) {
            return $this->responseError($exception, [], 500);
        }
    }
}

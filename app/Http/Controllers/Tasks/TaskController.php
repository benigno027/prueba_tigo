<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Services\Task\TaskService;
use App\Http\Controllers\Controller;
use App\Exceptions\Task\TaskException;
use App\Http\Requests\Tasks\AddTasksFormRequest;
use App\Http\Requests\Tasks\EditTasksFormRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return TaskService::displayTasksWebScreen();
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }

    public function fetch_data(Request $request)
    {
        try {
            return TaskService::getTasksWeb($request);
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $html = TaskService::displayCreateTaskWebModal();
            return response()->json(['html' => $html]);
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTasksFormRequest $request)
    {
        try {
            $data = $request->getData();
            $task = TaskService::createTask($data);
            return $this->response(true, "Registro creado exitosamente", ['data' => $task], [], 201);
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $html = TaskService::displayEditTaskWebModal($id);
            return response()->json(['html' => $html]);
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditTasksFormRequest $request)
    {
        try {

            $data = $request->getData();
            $task = TaskService::updateTask($id, $data);
            return $this->response(true, "Registro actualizado exitosamente", ['data' => $task], [], 200);
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }

    public function readyTask($id)
    {
        try {
            $task = TaskService::readyTask($id);
            return $this->response(true, "Registro actualizado exitosamente", ['data' => $task], [], 200);
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            TaskService::destroyTask($id);
            return $this->response(true, "Registro eliminado exitosamente", [], [], 200);
        } catch (TaskException $exception) {
            return $this->response(false, $e->message, [], $e->errors, $e->code);
        }
    }
}

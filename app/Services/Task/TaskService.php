<?php

namespace App\Services\Task;

use App\Models\Task\Task;
use Yajra\DataTables\DataTables;

class TaskService
{

    private static $index = 'task.index';
    private static $create = 'task.create';
    private static $edit = 'task.edit';

    private static $actions = 'task.columns.actions';
    private static $description = 'task.columns.description';

    public static function displayTasksWebScreen()
    {
        return view(self::$index);
    }

    public static function getTasksWeb($filters = null)
    {
        $tasks = Task::query()
            ->select('tasks.*');

        return \DataTables::of($tasks)
            ->addColumn('description', function ($data) {
                return view(self::$description, ['data' => $data])->render();
            })
            ->addColumn('actions', function ($data) {
                return view(self::$actions, ['data' => $data])->render();
            })
            ->rawColumns(['description', 'ready', 'actions'])
            ->make(true);
    }

    public static function getApiTasks($filters = null)
    {
        $tasks = Task::query()
            ->select('tasks.*');
        
        return $tasks->get();
    }

    public static function displayCreateTaskWebModal()
    {
        return view(self::$create)->render();
    }

    public static function createTask($data)
    {
        return Task::create($data);
    }

    public static function displayEditTaskWebModal($id)
    {
        $task = Task::findOrFail($id);

        $parameters = [
            'task' => $task,
        ];

        return view(self::$edit, $parameters)->render();
    }

    public static function updateTask($id, $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public static function readyTask($id)
    {
        $task = Task::findOrFail($id);
        $task->ready = !$task->ready;
        $task->save();
        return $task;
    }

    public static function destroyTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}

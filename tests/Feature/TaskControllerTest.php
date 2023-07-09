<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task\Task;
use App\Http\Controllers\Tasks\TaskController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexRoute()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        // Realiza otras aserciones necesarias
    }

    public function testCreateRoute()
    {
        $response = $this->get(route('tasks.create'));

        $response->assertStatus(200);
        // Realiza otras aserciones necesarias
    }

    public function testEditRoute()
    {
        $task = Task::create(
            [
                'description' => 'Descripción de la tarea',
                'ready' => false,
                'created_by' => null,
                'updated_by' => null,
                'deleted_by' => null
            ]
        );

        $response = $this->get(route('tasks.edit', ['id' => $task->id]));

        $response->assertStatus(200);
        // Realiza otras aserciones necesarias
    }
}

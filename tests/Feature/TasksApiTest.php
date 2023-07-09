<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task\Task;
use Database\Factories\TaskFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksApiTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Verifica que la API de obtener tareas esté activa.
     *
     * @return void
     */
    public function testGetTasksApi()
    {
        $response = $this->get('/api/v1/tasks');
        
        $response->assertStatus(200);
    }
    
    /**
     * Verifica que la API de almacenar tareas esté activa.
     *
     * @return void
     */
    public function testStoreTasksApi()
    {
        $data = [
            'description' => 'Descripción de la tarea'
        ];
        
        $response = $this->post('/api/v1/tasks/store', $data);
        
        $response->assertStatus(200);
    }
    
    /**
     * Verifica que la API de actualizar tareas esté activa.
     *
     * @return void
     */
    public function testUpdateTasksApi()
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
        
        $data = [
            'description' => 'Descripción actualizada'
        ];
        
        $response = $this->post('/api/v1/tasks/update/' . $task->id, $data);
        
        $response->assertStatus(200);
    }
    
    /**
     * Verifica que la API de eliminar tareas esté activa.
     *
     * @return void
     */
    public function testDeleteTasksApi()
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
        
        $response = $this->delete('/api/v1/tasks/delete/' . $task->id);
        
        $response->assertStatus(200);
    }
}


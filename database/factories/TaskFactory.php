<?php

namespace Database\Factories;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * El nombre del modelo asociado con la fábrica.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'ready' => $this->faker->boolean,
            'created_by' => null, // Define los valores adecuados aquí
            'updated_by' => null, // Define los valores adecuados aquí
            'deleted_by' => null, // Define los valores adecuados aquí
        ];
    }
}

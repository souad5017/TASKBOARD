<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        protected $model = Task::class;
    public function definition(): array
    {

return [
    'title' => $this->faker->sentence(4),
    'description' => $this->faker->paragraph(2),
    'deadline' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
    'priority' => $this->faker->randomElement(['basse', 'moyenne', 'haute']),
'status' => $this->faker->randomElement(['todo', 'inProgress', 'done']),

    'user_id' => \App\Models\User::inRandomOrder()->first()->id,
];

    }
}

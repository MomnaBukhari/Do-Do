<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Task;
use App\Models\User;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Generate a random user ID
            'title' => $this->faker->sentence(3), // Generate a title with 3 words
            'description' => $this->faker->paragraph(3), // Generate a random paragraph as description
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'attachments' => $this->faker->optional()->imageUrl(), // Generate a random image URL as attachment (optional)
            'status' => $this->faker->randomElement(['in_progress', 'postponed', 'completed']),
            'notes' => $this->faker->optional()->paragraph, // Generate an optional random paragraph for notes
            'completed' => $this->faker->boolean,
        ];
    }
}

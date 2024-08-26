<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\File;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $json = File::get(database_path('json/tasks.json'));
        $tasks = collect(json_decode($json, true));

        // Get all users
        $users = User::all();
        // Seed tasks
        foreach ($users as $user) {
            foreach ($tasks as $taskData) {
                Task::create([
                    'user_id' => $user->id,
                    'title' => $taskData['title'],
                    'description' => $taskData['description'],
                    'priority' => $taskData['priority'],
                    'due_date' => $taskData['due_date'],
                    'attachments' => $taskData['attachments'],
                    'status' => $taskData['status'],
                    'notes' => $taskData['notes'],
                    'completed' => $taskData['completed'],
                ]);
            }
        }
    }

}





    // // for fake function
    // for($i=1; $i<=100;$i++)
    // {
    //     task::cretae([
    //         'user_id' => fake()->id(),
    //         'title' => fake()->title(),
    //         'description' => fake()->description(),
    //         'priority' => fake()->priority(),
    //         'due_date' => fake()->due_date(),
    //         'attachments' => fake()->attachments(),
    //         'status' => fake()->status(),
    //         'notes' => fake()->notes(),
    //         'completed' => fake()->completed(),
    //     ]);
    // }

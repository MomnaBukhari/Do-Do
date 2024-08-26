<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

    //    $this->call([
    //     UserSeeder::class,
    //     TaskSeeder::class,
    //     ]);


        User::factory(14)->create();
        task::factory(14)->create();
    }
}

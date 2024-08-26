<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Momna Batool',
                'email' => 'momna@gmail.com',
                'password' => 'momnapassword',
            ],
            [
                'name' => 'Ahmed',
                'email' => 'ahmed@yahoo.com',
                'password' => 'ahmed12345',
            ],
            [
                'name' => 'User12',
                'email' => 'User12@gmail.com',
                'password' => 'user12',
            ],
            // more users can be added here
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'email_verified_at' => now(),
                'password' => Hash::make($userData['password']),
            ]);
        }
    }
}



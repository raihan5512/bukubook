<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'ADMIN BUKUBOOK',
                'email' => 'admin@bukubook.com',
                'password' => Hash::make('4dm1n'),
                'roles' => 'ADMIN',
            ], [
                'name' => 'USER BUKUBOOK',
                'email' => 'user@bukubook.com',
                'password' => Hash::make('us3r'),
                'roles' => 'USER',
            ],
            ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

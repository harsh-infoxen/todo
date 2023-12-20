<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email'=> 'admin@demo.com',
            'password'=> bcrypt('123456'),
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'Admin',
            'email'=> 'user@demo.com',
            'password'=> bcrypt('123456'),
        ]);

        $user->assignRole('User');
    }
}

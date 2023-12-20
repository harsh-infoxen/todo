<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view todos', 'guard_name' => config('auth.defaults.guard')]);
        Permission::create(['name' => 'create todos', 'guard_name' => config('auth.defaults.guard')]);
        Permission::create(['name' => 'edit todos', 'guard_name' => config('auth.defaults.guard')]);
        Permission::create(['name' => 'delete todos', 'guard_name' => config('auth.defaults.guard')]);
    }
}

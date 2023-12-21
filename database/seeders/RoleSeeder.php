<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(["name"=> "Admin"]);
        $userRole = Role::create(["name"=> "User"]);
        $userRole->givePermissionTo(['view', 'create', 'edit', 'delete']);
        $adminRole->givePermissionTo(['view', 'delete']);
    }
}

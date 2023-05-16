<?php

namespace Database\Seeders\System;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // Create Permissions
        $permissions = [
            'View',
            'Create',
            'Edit',
            'Delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'api']);
        }
        // Create Roles

        // Create Default Roles
        $manager = Role::create(['name' => 'Manager', 'guard_name' => 'api']);
        $cashier = Role::create(['name' => 'Cashier', 'guard_name' => 'api']);
        $backoffice = Role::create(['name' => 'Back Office', 'guard_name' => 'api']);
        $owner = Role::create(['name' => 'Owner', 'guard_name' => 'api']);

        $manager->givePermissionTo(Permission::all());
        $backoffice->givePermissionTo(Permission::all());
        $cashier->givePermissionTo(['View', 'Create', 'Edit']);
        $owner->givePermissionTo(Permission::all());
    }
}

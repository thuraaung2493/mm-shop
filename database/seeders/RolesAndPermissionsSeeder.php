<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit-items']);
        Permission::create(['name' => 'delete-items']);
        Permission::create(['name' => 'view-items']);

        Permission::create(['name' => 'edit-categories']);
        Permission::create(['name' => 'delete-categories']);
        Permission::create(['name' => 'view-categories']);

        Role::create(['name' => 'staff'])->givePermissionTo(['view-items', 'view-categories']);

        Role::create(['name' => 'admin'])->givePermissionTo(['view-items', 'edit-items', 'view-categories', 'edit-categories']);

        Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());
    }
}

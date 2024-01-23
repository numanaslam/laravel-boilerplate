<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define roles
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        $userRole = Role::create(['name' => 'user']);

        // Define default permissions
        $permissions = [
            'manage users',
            'manage roles',
            'manage permissions',
            'view dashboard',
        ];

        // Assign default permissions to roles
        foreach ($permissions as $permissionName) {
            $permission = Permission::create(['name' => $permissionName]);
            $adminRole->givePermissionTo($permission);
            $managerRole->givePermissionTo($permission);
            $userRole->givePermissionTo($permission);
        }

        // Additional permission assignments as needed
        $adminRole->givePermissionTo('create posts');
        $managerRole->givePermissionTo('edit posts');
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permisssions;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use RolesAndPermissionsSeeder;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'admin123'
        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\UserNotes::factory(1000)->create();


        $adminRole = Roles::create(['name' => 'Administrator']);
        $agentRole = Roles::create(['name' => 'Agent']);
        $supervisorRole = Roles::create(['name' => 'Supervisor']);
        // Define default permissions
        $permissions = [
            'view roles',
            'add roles',
            'edit roles',
            'delete roles',

            'view users',
            'add users',
            'edit users',
            'delete users',

            'view consolidator',
            'add consolidator',
            'edit consolidator',
            'delete consolidator',

            'view booking',
            'add booking',
            'edit booking',
            'delete booking',
            'reopen booking',
            'booking revert to query',
            'close booking',
            'process tickets',
            'change booking consultant',
            'booking print report',

            'view tickets',
            'add tickets',
            'edit tickets',
            'delete tickets',

            'view customers',
            'add customers',
            'edit customers',
            'delete customers',

            'view newsletter',
            'add newsletter',
            'edit newsletter',
            'delete newsletter',

            'view subscribers',
            'add subscribers',
            'edit subscribers',
            'delete subscribers',

            'view bankAccounts',
            'add bankAccounts',
            'edit bankAccounts',
            'delete bankAccounts',

            'view bankPayments',
            'add bankPayments',
            'edit bankPayments',
            'delete bankPayments',

            'view ConsolidatorPayments',
            'add ConsolidatorPayments',
            'edit ConsolidatorPayments',
            'delete ConsolidatorPayments',

            'view enquiry',
            'add enquiry',
            'edit enquiry',
            'delete enquiry',
            'change enquiry consultant',

            'view notifications',
            'add notifications',
            'edit notifications',
            'delete notifications',

            'view usernotes',
            'add usernotes',
            'edit usernotes',
            'delete usernotes',

            'enquiry export',
            'booking export',

        ];

        // Assign default permissions to roles
        foreach ($permissions as $permissionName) {
            $permission = Permisssions::create(['name' => $permissionName]);
            $adminRole->givePermissionTo($permission);
            $agentRole->givePermissionTo($permission);
            $supervisorRole->givePermissionTo($permission);
        }
        // $adminRole->givePermissionTo('create posts');

    }
}

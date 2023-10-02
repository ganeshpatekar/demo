<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $userList = Permission::create(['name' => 'users.list']);
        $userCreate = Permission::create(['name' => 'users.create']);
        $userUpdate = Permission::create(['name' => 'users.update']);
        $userView = Permission::create(['name' => 'users.view']);
        $userDelete = Permission::create(['name' => 'users.delete']);

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        // Assign the admin role to the admin user
        $admin->assignRole($adminRole);

        // Give permissions to the admin role
        $admin->givePermissionTo([
            $userCreate,
            $userList,
            $userUpdate,
            $userView,
            $userDelete,
        ]);

        // Create regular user
        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);

        // Assign the user role to the regular user
        $user->assignRole($userRole);

        // Give permissions to the user role
        $user->givePermissionTo([
            $userList,
        ]);

        $userRole->givePermissionTo([
            $userList,
        ]);
        $adminRole->givePermissionTo([
            $userCreate,
            $userList,
            $userUpdate,
            $userView,
            $userDelete,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );
        $role_administrator = Role::updateOrCreate(
            [
                'name' => 'administrator',
            ], 
        ['name' => 'administrator']
        );
        $role_member = Role::updateOrCreate(
            [
                'name' => 'member',
            ], 
            ['name' => 'member']
        );

        $permission = Permission::updateOrCreate([
            'name' => 'view_dashboard',
        ],
        ['name' => 'view_dashboard']
    );

    $permission2 = Permission::updateOrCreate([
        'name' => 'view_dashboard_administrator',
    ],
    ['name' => 'view_dashboard']
);

    $role_admin->givePermissionTo($permission);
    }
}

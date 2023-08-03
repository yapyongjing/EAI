<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //Permissions
       $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'user-list',
        'user-create',
        'user-delete',
        'user-edit',
        'form-list',
        'form-create',
        'form-edit',
        'form-delete',
    ];
   
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{


    public function run(): void
    {

         Permission::create(['name'=>'create-customer']);
         Permission::create(['name'=>'edit-customer']);
         Permission::create(['name'=>'delete-customer']);
        Permission::create(['name'=>'add-product']);
        Permission::create(['name'=>'edit-product']);
        Permission::create(['name'=>'delete-product']);
        Permission::create(['name'=>'add-order']);
        Permission::create(['name'=>'edit-order']);
        Permission::create(['name'=>'delete-order']);
        Permission::create(['name'=>'add-factor']);
        Permission::create(['name'=>'edit-factor']);
        Permission::create(['name'=>'delete-factor']);

        $superadminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $customer = Role::create(['name' => 'customer']);
        $default = Role::create(['name' => 'default']);


        $superadminRole->givePermissionTo([
            'create-customer',
            'edit-customer',
            'delete-customer',
            'add-product',
            'edit-product',
            'delete-product',
            'add-order',
            'edit-order',
            'delete-order',
            'add-factor',
            'edit-factor',
            'delete-factor'
        ]);
        $adminRole ->givePermissionTo([
            'edit-customer',
            'delete-customer',
            'edit-product',
            'delete-product',
            'edit-order',
            'delete-order',
            'edit-factor',
            'delete-factor'

        ]);
        $customer->givePermissionTo([
            'add-factor',
            'edit-factor',
            'delete-factor',
             'add-order',
            'edit-order',
            'delete-order',
        ]);

        $default->givePermissionTo([
            'add-factor',
            'edit-factor',
            'delete-factor',
            'add-order',
            'edit-order',
            'delete-order',
        ]);

    }
}

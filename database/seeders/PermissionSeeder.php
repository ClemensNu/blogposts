<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermission();

        Permission::create(['name'=>'list Blog Posts']);
        Permission::create(['name'=>'create Blog Posts']);
        Permission::create(['name'=>'store Blog Posts']);
        Permission::create(['name'=>'show Blog Posts']);
        Permission::create(['name'=>'edit Blog Posts']);
        Permission::create(['name'=>'update Blog Posts']);
        Permission::create(['name'=>'delete Blog Posts']);
       
        $role1=Role::create(['name'=>'Writer']);
        $role1->givePermission('list Blog Posts');
        $role1->givePermission('create Blog Posts');
        $role1->givePermission('store Blog Posts');
        $role1->givePermission('show Blog Posts');


        $role2=Role::create(['name'=>'Admin']);
        $role2->givePermission('list Blog Posts');
        $role2->givePermission('create Blog Posts');
        $role2->givePermission('store Blog Posts');
        $role2->givePermission('show Blog Posts');
        $role2->givePermission('edit Blog Posts');
        $role2->givePermission('update Blog Posts');


        $role3=Role::create(['name'=>'Super-Admin']);





        $user = User::factory()->create([
            'name' => 'Writer User',
            'email' => 'writer@letsgipe.com',
        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@letsgipe.com',
        ]);
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@letsgipe.com',
        ]);
        $user->assignRole($role3);
        



    }
}

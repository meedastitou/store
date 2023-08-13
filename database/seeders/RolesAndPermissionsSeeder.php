<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // app()[\Spatie\Pe]
        $array_of_permissions_names = [
            'users create', 'users view', 'users edit', 'users delete', 'users show',
            'roles create', 'roles view', 'roles edit', 'roles delete', 'roles show',
            'permissions create', 'permissions view', 'permissions edit', 'permissions delete', 'permissions show',
            'owners create', 'owners view', 'owners edit', 'owners delete', 'owners show',
            'stores create', 'stores view', 'stores edit', 'stores delete', 'stores show',
            'citys create', 'citys view', 'citys edit', 'citys delete', 'citys show',
            'products create', 'products view', 'products edit', 'products delete', 'products show', 
            'categorys create', 'categorys view', 'categorys edit', 'categorys delete', 'categorys show', 
            'posts create', 'posts view', 'posts edit', 'posts delete', 'posts show', 
            'blogs create', 'blogs view', 'blogs edit', 'blogs delete', 'blogs show', 
            'sliders create', 'sliders view', 'sliders edit', 'sliders delete', 'sliders show', 

        ];

        $permissions = collect($array_of_permissions_names)->map(function ($permission){
            return ['name' => $permission, 'guard_name' => 'web'];
        });


        // insert permissions into database 
        Permission::insert($permissions->toArray());

        $role = Role::create(['name'=> 'super admin']);
        $role->givePermissionTo($array_of_permissions_names);


    }
}

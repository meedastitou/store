<?php
namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository implements IRoleRepository
{
    public function findAllRoles()
    {
        return Role::orderBy('id', 'DESC');
    }

    public function createRole(Array $data){

        return $role = Role::create(['name' => $data['role'], 'guard_name' => 'web'])->givePermissionTo($data['permissions']);

    }
    public function updateRole(array $data, Role $role){
        return $role->update(['name'=> $data['role']]);
    }
    public function deleteRole(Role $role){
        $role->delete();
    }
}
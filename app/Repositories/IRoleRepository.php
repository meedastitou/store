<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

interface IRoleRepository
{
    public function findAllRoles();

    public function createRole(Array $data);

    public function updateRole(array $data, Role $role);

    public function deleteRole($role);
}

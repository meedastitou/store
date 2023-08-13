<?php

namespace App\Services;

use App\Http\Requests\Admin\Roles\RoleStoreRequest;
use App\Http\Requests\Admin\Roles\RoleUpdateRequest;
use Spatie\Permission\Models\Role;

interface IRoleService 
{

  public function findAllRoles();

  public function createRole(RoleStoreRequest $role);

  public function updateRole(RoleUpdateRequest $request ,Role $role);

  public function deleteRole(Role $role);

}
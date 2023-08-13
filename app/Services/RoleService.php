<?php

namespace App\Services;

use App\Http\Requests\Admin\Roles\RoleStoreRequest;
use App\Http\Requests\Admin\Roles\RoleUpdateRequest;
use App\Repositories\IRoleRepository;
use Spatie\Permission\Models\Role;

class RoleService implements IRoleService
{
  private $roleRepository;

  public function __construct(IRoleRepository $roleRepository)
  {
    $this->roleRepository = $roleRepository;
  }


  public function findAllRoles()
  {

    return $this->roleRepository->findAllRoles()->paginate(10);
  }

  public function createRole(RoleStoreRequest $request)
  {
    $data = $request->validated();

    return $this->roleRepository->createRole($data);

  }

  public function updateRole(RoleUpdateRequest $request, Role $role)
  {
        $data = $request->validated();
        $this->roleRepository->updateRole($data, $role);

        $role->syncPermissions($data['permissions']);
        return $role;
  }
  
  public function deleteRole(Role $role)
  {
    $this->roleRepository->deleteRole($role);
  }
}

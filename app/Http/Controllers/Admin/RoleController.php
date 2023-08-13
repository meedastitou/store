<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\RoleStoreRequest;
use App\Http\Requests\Admin\Roles\RoleUpdateRequest;
use App\Services\IRoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(IRoleService $roleService)
    {

        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = $this->roleService->findAllRoles();
        return view('admin.role.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $permissions = Permission::all();
        return view('admin.role.addRole', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {

        $role = $this->roleService->createRole($request);
        return redirect()->route('role.index')->with("success", "The Role ". $role->name ." has been Stored");
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        
        return view('admin.role.detailsRole', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {   

        $permissions = Permission::all();
        return view('admin.role.editRole', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {

        $role = $this->roleService->updateRole($request, $role);
        return redirect()->route('role.index')->with("success", "Role ". $role->name ." has been Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {

        $this->roleService->deleteRole($role);
        return redirect()->route('role.index')->with("success", "Role ". $role->name ." has been deleted");
    }
}

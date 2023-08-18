@extends('admin.layout.master')

@section('main')
    <!--**********************************
                                                                Content body start
                                                            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titles">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Details Role</a></li>
                        </ol>
                    </div>
                    <div class="mb-3 ">
                        <label for="role" class="form-label">Role Name</label>
                        <input type="text" class="form-control w-50" value="{{ $role->name }}" id="role">
                    </div>
                    <div class="mb-3 w-50">
                        <label for="permissions" class="form-label">Permissions</label>
                        <div class="row">
                            @foreach ($role->permissions as $permission)
                                <div class="col-md-6 col">
                                    <h4 style="font-family: none">{{$permission->name}}</h4>

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <form action="{{ route('role.destroy', $role->id) }}"
                        method="Post">
                        <a href="{{ route('role.edit', $role->id) }}"
                            class="btn btn-success shadow btn-xs  me-1">Edit Role</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to remove this role?')"
                            class="btn btn-danger shadow btn-xs ">Delete Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                                                Content body end
                                                            ***********************************-->
@endsection

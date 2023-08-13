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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Edit Role</a></li>
                        </ol>
                    </div>
                    <form action="{{ route('role.update', $role->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 ">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control w-50" name="role" id="role" value="{{$role->name}}"
                                placeholder="{{ __('dashboard.enter_name_role') }}">
                            @error('role')
                                <div class="alert alert-danger w-50">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="permissions" class="form-label">Permissions</label>
                            {{-- <input type="text" class="form-control w-50" name="permissions[]" id="permissions"
                                placeholder="{{ __('dashboard.select_permissions') }}"> --}}
                            <select class="select2-multiple-permissions form-control w-50" name="permissions[]"
                                multiple="multiple">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}"
                                        @if ($role->hasPermissionTo($permission->name))
                                            @selected(true)
                                        @endif
                                        >{{ $permission->name }}</option>
                                @endforeach
                            </select>

                            @error('permissions')
                                <div class="alert alert-danger w-50">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3 ">
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                                        Content body end
                                                    ***********************************-->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2-multiple-permissions').select2({
                placeholder: "{{ __('dashboard.select_permissions') }}",
                allowClear: true
            });
        });
    </script>
@endsection

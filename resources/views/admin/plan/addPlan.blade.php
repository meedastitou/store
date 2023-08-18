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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Add Plan</a></li>
                        </ol>
                    </div>
                    <form action="{{ route('plan.store') }}" method="post">
                        @csrf
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Plan Name</label>
                            <input type="text" class="form-control w-50" name="name" id="name"
                                placeholder="{{ __('dashboard.enter_name_plan') }}">
                            @error('name')
                                <div class="alert alert-danger w-50">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="description" class="form-label">Plan Description</label>
                            <input type="text" class="form-control w-50" name="description" id="description"
                                placeholder="{{ __('dashboard.enter_name_plan') }}">
                            @error('description')
                                <div class="alert alert-danger w-50">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="price" class="form-label">Plan Price</label>
                            <input type="number" class="form-control w-50" name="price" id="price"
                                placeholder="{{ __('dashboard.enter_name_plan') }}">
                            @error('price')
                                <div class="alert alert-danger w-50">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <div><b class="form-label">Plan Status</b></div>
                            <input type="radio" name="status" value="active" id="active">
                            <label for="active">Active</label><br>
                            <input type="radio" name="status" value="desactive" id="desactive">
                            <label for="desactive">Desactive</label>
                            @error('price')
                                <div class="alert alert-danger w-50">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <button type="submit" class="btn btn-primary">Create Plan</button>
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

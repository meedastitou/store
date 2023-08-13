@extends('admin.layout.master')
@section('main')
    <div class="content-body">
        <div class="container-fluid">

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif



            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">

                    <div class="mb-3">
                        <ul class="d-flex align-items-center flex-wrap">
                            <li><a href="{{ route('role.create') }}" class="btn btn-primary ">{{ __('header.role_add') }}</a>
                            </li>
                            {{-- <li><a href="blog-category.html" class="btn btn-primary mx-1">Blog Category</a></li> --}}
                            {{-- <li><a href="blog-category.html" class="btn btn-primary mt-sm-0 mt-1">Add Blog Category</a></li> --}}
                        </ul>
                    </div>
                    <div class="filter cm-content-box box-primary">
                        <div class="content-title">
                            <div class="cpa">
                                <i class="fa-solid fa-file-lines me-1"></i>{{ __('header.role_list') }}
                            </div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand SlideToolHeader"><i
                                        class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        {{-- <form action="{{ route('role.search') }}"> --}}
                        <input type="search" id="search" class="form-control" placeholder="Find role here"
                            name="search" value="{{ $search ?? '' }}">
                        {{-- </form> --}}

                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-responsive-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th style="">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkAll">
                                                        <label class="form-check-label" for="checkAll">

                                                        </label>
                                                    </div>
                                                </th>
                                                <th><strong>S.No</strong></th>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Details</strong></th>


                                                <th style="width:85px;"><strong>Actions</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault-1">
                                                            <label class="form-check-label" for="flexCheckDefault-1">

                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><b>{{ $role->id }}</b></td>
                                                    <td>{{ $role->name }}</td>
                                                    <td><a href="{{ route('role.show', $role->id) }}"
                                                        class="btn btn-primary shadow btn-xs sharp rounded-circle me-1">details</a></td>
                                                    <td>
                                                        <form action="{{ route('role.destroy', $role->id) }}"
                                                            method="Post">
                                                            <a href="{{ route('role.edit', $role->id) }}"
                                                                class="btn btn-primary shadow btn-xs sharp rounded-circle me-1"><i
                                                                    class="fa-solid fa-pencil"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure you want to remove this role?')"
                                                                class="btn btn-danger shadow btn-xs sharp rounded-circle"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>


                                                        {{-- <a href="{{ route('role.destroy', $role->id) }}"
                                                            onclick="return confirm('Are you sure you want to remove this role?')"
                                                            class="btn btn-danger shadow btn-xs sharp rounded-circle">></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>


                                </div>
                                {{ $roles->links() }}
                                {{-- <div class="d-flex align-items-center justify-content-xl-between flex-wrap justify-content-center mt-3">
                                <span>Page 1 of 5, showing 2 records out of 8 total, starting on record 1, ending on 2</span>
                                <nav aria-label="Page navigation example">
                                  <ul class="pagination mb-2 mb-sm-0">
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="fa-solid fa-angle-left"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link " href="javascript:void(0);"><i class="fa-solid fa-angle-right"></i></a></li>
                                  </ul>
                                </nav>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

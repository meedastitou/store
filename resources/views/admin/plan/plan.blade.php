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
                            <li><a href="{{ route('plan.create') }}" class="btn btn-primary ">{{ __('header.plan_add') }}</a>
                            </li>
                            {{-- <li><a href="blog-category.html" class="btn btn-primary mx-1">Blog Category</a></li> --}}
                            {{-- <li><a href="blog-category.html" class="btn btn-primary mt-sm-0 mt-1">Add Blog Category</a></li> --}}
                        </ul>
                    </div>
                    <div class="filter cm-content-box box-primary">
                        <div class="content-title">
                            <div class="cpa">
                                <i class="fa-solid fa-file-lines me-1"></i>{{ __('header.plan_list') }}
                            </div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand SlideToolHeader"><i
                                        class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        {{-- <form action="{{ route('plan.search') }}"> --}}
                        <input type="search" id="search" class="form-control" placeholder="Find plan here"
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
                                                <th><strong>Description</strong></th>
                                                <th><strong>Price</strong></th>
                                                <th class="text-center"><strong>Status</strong></th>
                                                <th style="width:85px;"><strong>Actions</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plans as $plan)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault-1">
                                                            <label class="form-check-label" for="flexCheckDefault-1">

                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><b>{{ $plan->id }}</b></td>
                                                    <td>{{ $plan->name }}</td>
                                                    <td>{{ Str::limit($plan->description, 20) }}</td>
                                                    <td>{{ $plan->price }}</td>
                                                    {{-- <td>{{ $plan->status == true ? "Active" : "desactive"}}</td> --}}
                                                    <td class="text-center">
                                                        @if ($plan->status == true)
                                                            <div class="badge badge-success">Active</div>
                                                        @else
                                                            <div class="badge badge-danger">Desactive</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('plan.destroy', $plan->id) }}"
                                                            method="Post">
                                                            <a href="{{ route('plan.edit', $plan->id) }}"
                                                                class="btn btn-primary shadow btn-xs sharp rounded-circle me-1"><i
                                                                    class="fa-solid fa-pencil"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure you want to remove this plan?')"
                                                                class="btn btn-danger shadow btn-xs sharp rounded-circle"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>


                                                        {{-- <a href="{{ route('plan.destroy', $plan->id) }}"
                                                            onclick="return confirm('Are you sure you want to remove this plan?')"
                                                            class="btn btn-danger shadow btn-xs sharp rounded-circle">></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>


                                </div>
                                {{ $plans->links() }}
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

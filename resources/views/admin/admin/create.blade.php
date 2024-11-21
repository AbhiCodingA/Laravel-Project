@extends('admin.master')
@section('title')
    Create New Admin
@endsection
@section('content')
    <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{-- <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.admin.store')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="email" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Select Roles</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select mb-3" name="role_id" aria-label="Default select example">
                                                <option>Roles</option>
                                                @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="password" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Admin / User</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.admin.store') }}" method="post">
                                @csrf
                                <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="adminName" class="form-label">
                                            <h6>Full Name<span class="text-danger">*</span></h6>
                                        </label>
                                        <input type="text" name="name" class="form-control" id="adminName"
                                            placeholder="Enter Full Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminEmail" class="form-label">
                                            <h6>Email Address<span class="text-danger">*</span></h6>
                                        </label>
                                        <input type="text" name="email" class="form-control" id="adminEmail"
                                            placeholder="Enter Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminEmail" class="form-label">
                                            <h6>Select Role<span class="text-danger">*</span></h6>
                                        </label>
                                        <select class="form-select mb-3" name="role_id" aria-label="Default select example">
                                            <option>Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminPassword" class="form-label">
                                            <h6>Password<span class="text-danger">*</span></h6>
                                        </label>
                                        <input type="text" name="password" class="form-control" id="adminPassword"
                                            placeholder="Enter Password">
                                    </div>
                                    <input type="submit" value="Save" class="btn btn-success px-5 radius-30">
                                </div>
                            </form>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>


    </div>
@endsection

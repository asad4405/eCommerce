@extends('layouts.backend_master')
@section('content')
    <!-- Page Sidebar Start -->
    <div class="page-body">
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Admin Information</h5>
                                    </div>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button">Admin Lists</button>
                                        </li>

                                        @if (auth()->user()->id == 1)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-home" type="button">Admin Create</button>
                                            </li>
                                        @endif
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        @if (auth()->user()->id == 1)
                                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                                                <div class="table-responsive category-table">
                                                    <table class="table all-package theme-table" id="table_id">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                @if (auth()->user()->id == 1)
                                                                    <th>Action</th>
                                                                @else
                                                                    <th>Admin</th>
                                                                @endif
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($admins as $admin)
                                                                <tr>
                                                                    <td>{{ $admin->name }}</td>
                                                                    <td>{{ $admin->email }}</td>
                                                                    @if (auth()->user()->id == 1)
                                                                        <td>
                                                                            @if ($admin->id == 1)
                                                                                <span class="badge bg-info">Super
                                                                                    Admin</span>
                                                                            @else
                                                                                <ul>
                                                                                    @if ($admin->deleted_at)
                                                                                        <li>
                                                                                            <a href="{{ route('admin.active', $admin->id) }}"
                                                                                                class="btn btn-sm btn-info">Active</a>
                                                                                        </li>
                                                                                    @else
                                                                                        <li>
                                                                                            <a href="{{ route('admin.deactive', $admin->id) }}"
                                                                                                class="btn btn-sm btn-warning">Deactive</a>
                                                                                        </li>
                                                                                    @endif
                                                                                    <li>
                                                                                        <a href="{{ route('admin.delete', $admin->id) }}" class="btn btn-sm btn-secondary">
                                                                                            Delete
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            @endif
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="pills-home" role="tabpanel">
                                                <form class="theme-form theme-form-2 mega-form"
                                                    action="{{ route('add.new.admin.post') }}" method="POST">
                                                    @csrf
                                                    <div class="card-header-1">
                                                        <h5>Add New Admin</h5>
                                                    </div>

                                                    @if (session('admin-success'))
                                                        <div class="alert alert-success">{{ session('admin-success') }}
                                                        </div>
                                                    @endif

                                                    <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                            <label class="form-label-title col-lg-2 col-md-3 mb-0">
                                                                Name</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="text" name="name">
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                            </label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="email" name="email">
                                                                @error('email')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title"></label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <button type="submit" class="btn btn-animation">
                                                                    Create New Admin
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                                                <div class="table-responsive category-table">
                                                    <table class="table all-package theme-table" id="table_id">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($admins as $admin)
                                                                <tr>
                                                                    <td>{{ $admin->name }}</td>
                                                                    <td>{{ $admin->email }}</td>
                                                                    <td>
                                                                        @if ($admin->id == 1)
                                                                            <span class="badge bg-success">Super
                                                                                Admin</span>
                                                                        @else
                                                                            <span class="badge bg-warning">
                                                                                Admin</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User End -->
@endsection

@extends('layouts.backend_master')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Users</h5>
                                {{-- <form class="d-inline-flex">
                                    <a href="" class="align-items-center btn btn-theme">
                                        <i data-feather="plus"></i>Add New
                                    </a>
                                </form> --}}
                            </div>

                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Name</th>
                                            <th>Email / Phone Number</th>
                                            <th>Date</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="table-image">
                                                        @if ($user->profile_photo)
                                                            <img src="{{ asset('uploads/profile_photos') }}/{{ $user->profile_photo }}"
                                                                class="img-fluid" alt="">
                                                        @else
                                                            <img src="{{ Avatar::create($user->name)->toBase64() }}"
                                                                class="img-fluid" alt="">
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="user-name">
                                                        <span>{{ $user->name }}</span>
                                                        @if ($user->id == 1)
                                                            <span>Super Admin</span>
                                                        @else
                                                            <span>{{ $user->role }}</span>
                                                        @endif
                                                    </div>
                                                </td>

                                                @if ($user->phone_number)
                                                    <td>{{ $user->email }} || {{ $user->phone_number }}</td>
                                                @else
                                                    <td>{{ $user->email }}</td>
                                                @endif

                                                <td>{{ $user->created_at->format('d-m-Y h:i:s A') }}</td>

                                                <td>
                                                    <ul>
                                                        @if ($user->id == 1)
                                                            <li>
                                                                <button class="btn btn-sm btn-info">Super Admin</button>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="order-detail.html">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="" class="btn btn-sm btn-info">
                                                                    Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <button type="submit" class="btn btn-sm btn-secondary">
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All User Table Ends-->
@endsection

@extends('layouts.backend_master')
@section('content')
    <!-- Settings Section Start -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Profile Information</h5>
                                    </div>
                                    @if (session('profile-update-success'))
                                        <div class="alert alert-success">{{ session('profile-update-success') }}</div>
                                    @endif
                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('profile.update') }}"
                                        method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">First Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text"
                                                        value="{{ old('name', $user->name) }}"
                                                        placeholder="Enter Your First Name" name="name">
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Enter Email
                                                    Address</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="email"
                                                        value="{{ old('email', $user->email) }}"
                                                        placeholder="Enter Your Email Address" name="email">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-animation">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Update Profile Photo</h5>
                                    </div>
                                    @if (session('photo-success'))
                                        <div class="alert alert-success">{{ session('photo-success') }}</div>
                                    @endif
                                    <form class="theme-form theme-form-2 mega-form"
                                        action="{{ route('change.profile.photo') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-2 col-form-label form-label-title">Profile
                                                    Photo</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control form-choose" type="file"
                                                        id="formFileMultiple" name="profile_photo">
                                                    @error('profile_photo')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-animation">Update Profile
                                                        Photo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Update Password</h5>
                                    </div>
                                    @if (session('password-success'))
                                        <div class="alert alert-success">{{ session('password-success') }}</div>
                                    @endif
                                    @if ($errors->updatePassword->any())
                                        <div class="alert alert-secondary">
                                            <ul>
                                                @foreach ($errors->updatePassword->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('password.update') }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Current Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="password" id="password_one"
                                                        placeholder="Enter Your Password" name="current_password">
                                                    <input type="checkbox" id="showPassword_one"> Show Password
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Update Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="password" id="password_two"
                                                        placeholder="Enter Your Password" name="password">
                                                    <input type="checkbox" id="showPassword_two"> Show Password
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Confirm
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="password" id="password_three"
                                                        placeholder="Enter Your Confirm Passowrd"
                                                        name="password_confirmation">
                                                    <input type="checkbox" id="showPassword_three"> Show Password
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-animation">Update
                                                        Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Add New Address</h5>
                                    </div>
                                    @if (session('address-success'))
                                        <div class="alert alert-success">{{ session('address-success') }}</div>
                                    @endif
                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('add.address') }}"
                                        method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Tag</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="tag" id="">
                                                        <option value="Home">Home</option>
                                                        <option value="Office">Office</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="name"
                                                        placeholder="Enter Your Name" name="name">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">City</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="city"
                                                        placeholder="Enter Your City" name="city">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Country</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="country"
                                                        placeholder="Enter Your Country" name="country">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Address</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="address" id="" rows="4"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Post Code</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="post_code"
                                                        placeholder="Enter Your Post Code" name="post_code">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="phone_number"
                                                        placeholder="Enter Your Phone Number" name="phone_number">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-animation">Add
                                                        New Address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Details End -->

                        <!-- Address Start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2 mb-3">
                                    <h5>Address</h5>
                                </div>

                                <div class="save-details-box">
                                    <div class="row g-4">
                                        @forelse ($addresses as $address)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="save-details">
                                                <div class="save-name">
                                                    <h5>{{ $address->name }}</h5>
                                                </div>

                                                <div class="save-position">
                                                    <h6>{{ $address->tag }}</h6>
                                                </div>

                                                <div class="save-address">
                                                    <p>Address: {{ $address->address }}</p>
                                                    <p>City: {{ $address->city }}</p>
                                                    <p>Post Code: {{ $address->post_code }}</p>
                                                </div>

                                                <div class="mobile">
                                                    <p class="mobile">Mobile No. {{ $address->phone_number }}</p>
                                                </div>

                                                {{-- <div class="button">
                                                    <a href="javascript:void(0)" class="btn btn-sm">Edit</a>
                                                    <a href="javascript:void(0)" class="btn btn-sm">Remove</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Address End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Settings Section End -->
    <!-- Page Body End-->
@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#showPassword_one').on('change', function() {
                var passwordField = $('#password_one');
                var passwordFieldType = passwordField.attr('type');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#showPassword_two').on('change', function() {
                var passwordField = $('#password_two');
                var passwordFieldType = passwordField.attr('type');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#showPassword_three').on('change', function() {
                var passwordField = $('#password_three');
                var passwordFieldType = passwordField.attr('type');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                }
            });
        });
    </script>
@endsection

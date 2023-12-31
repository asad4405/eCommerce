@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Customer Register</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Customer Register</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('frontend_assets') }}/images/inner-page/sign-up.png" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Fastkart</h3>
                            <h4>Create New Account</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Name"
                                            name="name">
                                        <label for="name">Name</label>
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email Address">
                                        <label for="email">Email Address</label>
                                    </div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control" id="password" placeholder="Password"
                                            name="password">
                                        <label for="password">Password</label>
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control" id="password"
                                            name="password_confirmation" placeholder="Confirm Password">
                                        <label for="password">Confirm Password</label>
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span>Terms</span> and <span>Privacy</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">Register</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="{{ route('google.redirect') }}" class="btn google-button w-100">
                                        <img src="{{ asset('frontend_assets') }}/images/inner-page/google.png"
                                            class="blur-up lazyload" alt="">
                                        Register with Google
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('facebook.redirect') }}" class="btn google-button w-100">
                                        <img src="{{ asset('frontend_assets') }}/images/inner-page/facebook.png"
                                            class="blur-up lazyload" alt=""> Register with Facebook
                                    </a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('github.redirect') }}" class="btn google-button w-100">
                                        <img src="{{ asset('frontend_assets') }}/images/inner-page/github.png"
                                            class="blur-up lazyload" alt=""> Register with Github
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('linkedin.redirect') }}" class="btn google-button w-100">
                                        <img src="{{ asset('frontend_assets') }}/images/inner-page/linkedin.png"
                                            class="blur-up lazyload" alt=""> Register with Linked In
                                    </a>
                                </li> --}}
                                <li>
                                    <a href="" class="btn google-button w-100" data-bs-toggle="modal"
                                        data-bs-target="#phone">
                                        <img src="{{ asset('frontend_assets') }}/images/inner-page/phone.png"
                                            class="blur-up lazyload" alt=""> Register with Phone Number
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Already have an account?</h4>
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- Edit Card Start -->
    <div class="modal fade theme-modal" id="phone" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel8">Register with Phone Number</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ route('send.otp') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-4">
                            <div class="col-xxl-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="phone" placeholder=""
                                        name="phone_number">
                                    <label for="phone">Phone Number</label>
                                </div>
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-animation btn-md fw-bold"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn theme-bg-color btn-md fw-bold text-light">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Card End -->
    <!-- register section end -->
@endsection

@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Login OTP</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Login OTP</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section otp-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('frontend_assets') }}/images/inner-page/otp.png" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title">
                                
                                @if (session('otp-error'))
                                    <div class="alert alert-danger">{{ session('otp-error') }}</div>
                                @endif
                                @if (session('login-otp-error'))
                                    <div class="alert alert-danger">{{ session('login-otp-error') }}</div>
                                @endif
                                @if (session('otp-valid_till-error'))
                                    <div class="alert alert-danger">{{ session('otp-valid_till-error') }}</div>
                                @endif

                                <h3 class="text-title">Please enter the one time password to verify your account</h3>
                                <h5 class="text-content">A code has been sent to <span>
                                        {{ substr(session('S_otp_phone_number'), 0, 2) }} *******
                                        {{ substr(session('S_otp_phone_number'), -2) }}</span></h5>
                            </div>

                            <form action="{{ route('login.validate.otp') }}" method="POST">
                                @csrf
                                <div id="otp" class="inputs d-flex flex-row justify-content-center">
                                    <input class="text-center form-control rounded" type="text" id="first"
                                        maxlength="1" placeholder="0" name="first">
                                    <input class="text-center form-control rounded" type="text" id="second"
                                        maxlength="1" placeholder="0" name="second">
                                    <input class="text-center form-control rounded" type="text" id="third"
                                        maxlength="1" placeholder="0" name="third">
                                    <input class="text-center form-control rounded" type="text" id="fourth"
                                        maxlength="1" placeholder="0" name="fourth">
                                    <input class="text-center form-control rounded" type="text" id="fifth"
                                        maxlength="1" placeholder="0" name="fifth">
                                    <input class="text-center form-control rounded" type="text" id="sixth"
                                        maxlength="1" placeholder="0" name="sixth">
                                </div>

                                <div class="send-box pt-4">
                                    <h5>Didn't get the code? <a href="{{ route('resend.otp') }}"
                                            class="theme-color fw-bold">Resend
                                            It</a></h5>
                                </div>

                                <button class="btn btn-animation w-100 mt-3" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
@endsection

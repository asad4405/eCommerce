@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Verify Email</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Verify Email</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- 404 Section Start -->
    <section class="section-404 section-lg-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="image-404">
                        <img src="{{ asset('frontend_assets') }}/images/inner-page/email-verify.png"
                            class="img-fluid blur-up lazyload" alt="">
                    </div>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        <h5>A new verification link has been sent to the email address you provided during registration.</h5>

                    </div>
                @endif

                <div class="col-12">
                    <div class="contain-404">
                        <h3 class="text-content">
                            Thanks for signing up! Before getting started, could you verify your email address by clicking
                            on the link we just emailed to you? If you didn't receive the email, we will gladly send you
                            another.
                        </h3>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <button class="btn btn-md text-white theme-bg-color mt-4 mx-auto">Resend Verification
                                Email</button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button onclick="location.href = '{{ route('index') }}';"
                                class="btn btn-md text-white bg-danger mt-4 mx-auto">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 Section End -->
@endsection



{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

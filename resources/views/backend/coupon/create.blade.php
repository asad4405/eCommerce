@extends('layouts.backend_master')
@section('content')
    <!-- Create Coupon Table start -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Create Coupon</h5>
                                    </div>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button">General</button>
                                        </li>
                                    </ul>

                                    @if (session('coupon-success'))
                                        <div class="alert alert-success">{{ session('coupon-success') }}</div>
                                    @endif

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form"
                                                action="{{ route('coupon.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-lg-2 col-md-3 mb-0">Coupon
                                                            Name</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="coupon_name">
                                                            @error('coupon_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Coupon
                                                            Discount (%)</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text"
                                                                name="coupon_discount">
                                                            @error('coupon_discount')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                            Validity </label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="date" name="validity"
                                                                min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
                                                            @error('validity')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                            Limit </label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="limit">
                                                            @error('limit')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                            Highest Discount Amount </label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text"
                                                                name="highest_discount">
                                                            @error('highest_discount')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <label class="form-label-title col-lg-2 col-md-3 mb-0"></label>
                                                        <div class="col-md-9">
                                                            <button type="submit" class="btn btn-animation">Create New
                                                                Coupon</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Coupon Table End -->
@endsection

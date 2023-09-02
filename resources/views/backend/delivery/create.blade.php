@extends('layouts.backend_master')
@section('content')
    <div class="page-body">
        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col-xxl-8 col-lg-10 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Delivery Option</h5>
                                    </div>

                                    @if (session('product-delivery-cost-success'))
                                        <div class="alert alert-success">{{ session('product-delivery-cost-success') }}</div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('delivery.store') }}"
                                        method="POST">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Delivery
                                                Address</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Delivery Address"
                                                    name="product_delivery_address">
                                                @error('product_delivery_address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Delivery
                                                Cost</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Delivery Cost"
                                                    name="product_delivery_cost">
                                                @error('product_delivery_cost')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"></label>
                                            <div class="col-sm-9">
                                                <button class="btn theme-bg-color text-white">Add Product Delivery Cost</button>
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
    <!-- New Product Add End -->
@endsection

@extends('layouts.backend_master')
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Stocks Information</h5>
                                    </div>

                                    @if (session('stock-success'))
                                        <div class="alert alert-success">{{ session('stock-success') }}</div>
                                    @endif

                                    @if (session('stock-error'))
                                        <div class="alert alert-secondary">{{ session('stock-error') }}</div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('stock.store') }}"
                                        method="POST">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Product</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100 form-control" name="product_id">
                                                    <option>- Select One Product -</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->product_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('product_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Color</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="color_id">
                                                    <option>- Select & One Color -</option>
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->color_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('color_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Size</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="size_id">
                                                    <option>- Select & One Size -</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->size_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('size_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Quantity</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="product_quantity">
                                                @error('product_quantity')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Regular Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="product_regular_price">
                                                @error('product_regular_price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Discount Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="product_discount_price">
                                                @error('product_discount_price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-animation">Add New Stock</button>
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

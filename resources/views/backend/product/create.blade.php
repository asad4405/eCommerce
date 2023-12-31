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
                                        <h5>Product Information</h5>
                                    </div>

                                    @if (session('product-success'))
                                        <div class="alert alert-success">{{ session('product-success') }}</div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('product.store') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100 form-select"
                                                    name="category_id">
                                                    <option value="">- Select One Category -</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Name"
                                                    name="product_name">
                                                @error('product_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Short Details</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_short_details" id="editor1" class="form-control" rows="3"></textarea>
                                                @error('product_short_details')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Long Details</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_long_details" id="editor2" class="form-control" rows="4"></textarea>
                                                @error('product_long_details')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Additional Info</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_additional_info" id="editor3" class="form-control" rows="4"></textarea>
                                                @error('product_additional_info')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Care Instuctions</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_care_instuctions" id="editor4" class="form-control" rows="4"></textarea>
                                                @error('product_care_instuctions')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Photos</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="product_photos[]" multiple>
                                                @error('product_photos')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-animation">Add New Product</button>
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

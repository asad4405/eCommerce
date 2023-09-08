@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Product Review</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">Product Review</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    @if (session('review-success'))
                        <div class="alert alert-success">{{ session('review-success') }}</div>
                    @endif
                    @foreach ($products as $product)
                        <div class="card mb-5">
                            <div class="card-header">
                                <h3>Add a Review</h3>
                            </div>
                            <form action="{{ route('insert.review', $product->id) }}" method="POST">
                                @csrf
                                <div class="card-body">

                                    <div class="col-xl-12">
                                        <div class="row g-4">
                                            <div class="col-md-12">
                                                <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $product->relationtoProduct->id)->first()->product_photos }}"
                                                    alt="" width="50">
                                                <h4 class="text-success">Product Name:
                                                    {{ $product->relationtoProduct->product_name }}
                                                </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Color:
                                                    {{ $product->relationtoColor->color_name }}
                                                </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Size:
                                                    {{ $product->relationtoSize->size_name }}
                                                </h4>
                                            </div>

                                            @if (App\Models\Review::where('invoice_details_id', $product->id)->exists())
                                                <div class="col-md-12">
                                                    <div class="alert alert-success">
                                                        <h3>Review Already Given ✔️</h3>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <div class="form-floating theme-form-floating">
                                                        <select name="rating" id="" class="form-select">
                                                            <option value="5">5 Star</option>
                                                            <option value="4">4 Star</option>
                                                            <option value="3">3 Star</option>
                                                            <option value="2">2 Star</option>
                                                            <option value="1">1 Star</option>
                                                        </select>
                                                        <label for="name">Select Rating</label>
                                                    </div>
                                                    @error('rating')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-floating theme-form-floating">
                                                        <textarea class="form-control" name="review" placeholder="Leave a review here" id="floatingTextarea2"
                                                            style="height: 150px"></textarea>
                                                        <label for="floatingTextarea2">Write Your
                                                            Review</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating theme-form-floating">
                                                        <button type="submit" class="btn btn-sm bg-success text-white">Send
                                                            Review</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

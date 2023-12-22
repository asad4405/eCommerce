@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Wishlist</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Start -->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-3 g-2">
                @forelse ($wishlists as $wishlist)
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                        <div class="product-box-3 h-100">
                            <div class="product-header">
                                <div class="product-image">
                                    <a href="{{ route('product.details', $wishlist->product_id) }}">
                                        <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $wishlist->product_id)->first()->product_photos }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="product-header-top">
                                        <button class="btn wishlist-button close_button">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-footer">
                                <div class="product-detail">
                                    <span class="span-name">Vegetable</span>
                                    <a href="{{ route('product.details', $wishlist->product_id) }}">
                                        <h5 class="name">{{ $wishlist->relationToWishlist->product_name }}</h5>
                                    </a>

                                    
                                    <h6 class="unit mt-1">250 ml</h6>
                                    <h5 class="price">
                                        <span class="theme-color">{{ $inventory->product_discount_price }}</span>
                                        @if ($inventory->product_discount_price != $inventory->product_regular_price)
                                            <del>{{ $inventory->product_regular_price }}</del>
                                        @endif
                                    </h5>

                                    <div class="add-to-cart-box bg-white mt-2">
                                        <button class="btn btn-add-cart addcart-button"
                                            onclick="location.href = '{{ route('product.details', $wishlist->product_id) }}';">Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <td>not available</td>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
@endsection

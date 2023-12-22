@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>{{ $product->product_name }}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">{{ $product->product_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            @foreach ($product_photos as $product_photo)
                                                <div>
                                                    <div class="slider-image">
                                                        <img src="{{ asset('uploads/product_photos') }}/{{ $product_photo->product_photos }}"
                                                            id="img-1"
                                                            data-zoom-image="{{ asset('frontend_assets') }}/images/product/category/1.jpg"
                                                            class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                        <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                            @foreach ($product_photos as $product_photo)
                                                <div>
                                                    <div class="sidebar-image">
                                                        <img src="{{ asset('uploads/product_photos') }}/{{ $product_photo->product_photos }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                @if (lowest_discount_price($product->id) != 0)
                                    <h6 class="offer-top">30% Off</h6>
                                @endif
                                <h2 class="name">{{ $product->product_name }}</h2>
                                <div class="price-rating">
                                    @if (lowest_discount_price($product->id) == 0)
                                        <span class="theme-color price">Coming Soon !!</span>
                                    @else
                                        <h3 class="theme-color price" id="discount_price">
                                            {{ lowest_discount_price($product->id) }} taka
                                        </h3>
                                        @if (lowest_discount_price($product->id) != lowest_regular_price($product->id))
                                            <del class="text-content text-danger"
                                                id="regular_price">{{ lowest_regular_price($product->id) }} taka</del>
                                        @endif
                                    @endif
                                    {{-- <span class="offer theme-color">(8% off)</span> --}}
                                    @if (lowest_discount_price($product->id) != 0)
                                        <div class="product-rating custom-rate">
                                            <ul class="rating">
                                                @for ($i = 1; $i <= round(reviews($product->id)->average('rating')); $i++)
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                @endfor
                                                @for ($i = 1; $i <= 5 - round(reviews($product->id)->average('rating')); $i++)
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                @endfor
                                            </ul>
                                            @if (review_checker($product->id))
                                                <span class="review">({{ reviews($product->id)->count() }} Customer
                                                    Review)</span>
                                            @else
                                                <span>(No Ratings)</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <div class="procuct-contain">
                                    <p>
                                        {!! $product->product_short_details !!}
                                    </p>
                                </div>

                                <div class="product-packege ">
                                    <div class="product-title">
                                        <h4>Color</h4>
                                    </div>
                                    <select name="" class="form-control" id="color_dropdown">
                                        <option value="">-Choose One Color-</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->color_id }}">
                                                {{ App\Models\Color::find($color->color_id)->color_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="product-title">
                                        <h4>Size</h4>
                                    </div>
                                    <select name="" class="form-control" id="size_dropdown">
                                        <option value="">-Select Color First-</option>
                                    </select>
                                </div>
                                <div class="note-box product-packege">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1" id="user_input">
                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @auth
                                        <button id="add_to_cart"
                                            class="d-none btn btn-md bg-dark cart-button text-white w-100">Add To Cart</button>
                                    @else
                                        <button onclick="location.href = '{{ route('login') }}';" id="add_to_cart"
                                            class="d-none btn btn-md bg-dark cart-button text-white w-100">Login</button>
                                    @endauth
                                </div>

                                <div class="buy-box">
                                    {{-- <a href="{{ route('add.wishlist') }}">
                                        <i data-feather="heart"></i>
                                        <span>Add To Wishlist</span>
                                    </a> --}}
                                    <form action="{{ route('add.wishlist', $product->id) }}" method="POST">
                                        @csrf
                                        <button><i data-feather="heart"></i> Add To Wishlist</button>
                                    </form>
                                </div>

                                <div class="pickup-box">
                                    {{-- <div class="product-title">
                                        <h4>Store Information</h4>
                                    </div>

                                    <div class="pickup-detail">
                                        <h4 class="text-content">Lollipop cake chocolate chocolate cake dessert jujubes.
                                            Shortbread sugar plum dessert powder cookie sweet brownie.</h4>
                                    </div> --}}

                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            {{-- <li>Type : <a href="javascript:void(0)">Black Forest</a></li>
                                            <li>SKU : <a href="javascript:void(0)">SDFVW65467</a></li>
                                            <li>MFG : <a href="javascript:void(0)">Jun 4, 2022</a></li> --}}
                                            <li>Stock : <a href="" id="product_stock">Select Color & Size</a></li>
                                            <li>Category : <a
                                                    href="">{{ $product->relationToCategory->category_name }}</a>
                                            </li>
                                            {{-- <li>Tags : <a href="javascript:void(0)">Cake,</a> <a
                                                    href="javascript:void(0)">Backery</a></li> --}}
                                        </ul>
                                    </div>
                                </div>

                                <div class="paymnet-option">
                                    <div class="product-title">
                                        <h4>Guaranteed Safe Checkout</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/images/product/payment/1.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/images/product/payment/2.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/images/product/payment/3.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/images/product/payment/4.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/images/product/payment/5.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">Description</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                            aria-selected="false">Additional info</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                            data-bs-target="#care" type="button" role="tab" aria-controls="care"
                                            aria-selected="false">Care Instuctions</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab"
                                            aria-controls="review" aria-selected="false">Review</button>
                                    </li>
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-description" style="display: list-item">
                                            {!! $product->product_long_details !!}
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="info" role="tabpanel"
                                        aria-labelledby="info-tab">
                                        {{ $product->product_additional_info }}
                                        {{-- <div class="table-responsive">
                                            <table class="table info-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Specialty</td>
                                                        <td>Vegetarian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ingredient Type</td>
                                                        <td>Vegetarian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brand</td>
                                                        <td>Lavian Exotique</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Form</td>
                                                        <td>Bar Brownie</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Package Information</td>
                                                        <td>Box</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manufacturer</td>
                                                        <td>Prayagh Nutri Product Pvt Ltd</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Item part number</td>
                                                        <td>LE 014 - 20pcs Crème Bakes (Pack of 2)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Net Quantity</td>
                                                        <td>40.00 count</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> --}}
                                    </div>

                                    <div class="tab-pane fade" id="care" role="tabpanel"
                                        aria-labelledby="care-tab">
                                        <div class="information-box">
                                            {{ $product->product_care_instuctions }}
                                            {{-- <ul>
                                                <li>Store cream cakes in a refrigerator. Fondant cakes should be
                                                    stored in an air conditioned environment.</li>

                                                <li>Slice and serve the cake at room temperature and make sure
                                                    it is not exposed to heat.</li>

                                                <li>Use a serrated knife to cut a fondant cake.</li>

                                                <li>Sculptural elements and figurines may contain wire supports
                                                    or toothpicks or wooden skewers for support.</li>

                                                <li>Please check the placement of these items before serving to
                                                    small children.</li>

                                                <li>The cake should be consumed within 24 hours.</li>

                                                <li>Enjoy your cake!</li>
                                            </ul> --}}
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="review" role="tabpanel"
                                        aria-labelledby="review-tab">
                                        <div class="review-box">
                                            <div class="row g-4">
                                                <div class="col-xl-12">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer reviews</h4>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= round(reviews($product->id)->average('rating')); $i++)
                                                                    <li>
                                                                        <i data-feather="star" class="fill"></i>
                                                                    </li>
                                                                @endfor
                                                                @for ($i = 1; $i <= 5 - round(reviews($product->id)->average('rating')); $i++)
                                                                    <li>
                                                                        <i data-feather="star"></i>
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                        @if (review_checker($product->id))
                                                            <h6 class="ms-3">
                                                                {{ reviews($product->id)->average('rating') }}
                                                                Out Of 5</h6>
                                                        @else
                                                            <h6 class="ms-3">No Ratings</h6>
                                                        @endif
                                                    </div>

                                                    <div class="rating-box">
                                                        <ul>
                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>5 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 68%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            68%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>4 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 67%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            67%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>3 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 42%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            42%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>2 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 30%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            30%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>1 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 24%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            24%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    @if (review_checker($product->id))
                                                        <div class="review-title">
                                                            <h4 class="fw-500">Customer Reviews</h4>
                                                        </div>
                                                    @endif

                                                    <div class="review-people">
                                                        <ul class="review-list">
                                                            @foreach (reviews($product->id) as $review)
                                                                <li>
                                                                    <div class="people-box">
                                                                        <div>
                                                                            <div class="people-image">
                                                                                <img src="{{ asset('frontend_assets') }}/images/review/1.jpg"
                                                                                    class="img-fluid blur-up lazyload"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="people-comment">
                                                                            <a class="name"
                                                                                href="javascript:void(0)">{{ $review->user->name }}</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content">
                                                                                    {{ $review->created_at->format('d M Y') }}
                                                                                    at
                                                                                    {{ $review->created_at->format('h:i A') }}
                                                                                </h6>

                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        @for ($i = 1; $i <= $review->rating; $i++)
                                                                                            <li>
                                                                                                <i data-feather="star"
                                                                                                    class="fill"></i>
                                                                                            </li>
                                                                                        @endfor
                                                                                        @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                                                                            <li>
                                                                                                <i data-feather="star"></i>
                                                                                            </li>
                                                                                        @endfor
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                            <div class="reply">
                                                                                <p>
                                                                                    {{ $review->review }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
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

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="verndor-contain">
                                <div class="vendor-image">
                                    @if ($vendor->profile_photo)
                                        <img src="{{ asset('uploads/profile_photos/') }}/{{ $vendor->profile_photo }}"
                                            class="blur-up lazyload" alt="">
                                    @else
                                        <img src="{{ Avatar::create($vendor->name)->toBase64() }}"
                                            class="blur-up lazyload" alt="">
                                    @endif
                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">{{ $vendor->name }}</h5>

                                    <div class="product-rating mt-1">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                        <span>(36 Reviews)</span>
                                    </div>

                                </div>
                            </div>

                            {{-- <p class="vendor-detail">Noodles & Company is an American fast-casual
                                restaurant that offers international and American noodle dishes and pasta.</p> --}}

                            <div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="map-pin"></i>
                                            <h5>Address: <span class="text-content">{{ $vendor->email }}</span></h5>
                                        </div>
                                    </li>

                                    {{-- <li>
                                        <div class="address-contact">
                                            <i data-feather="headphones"></i>
                                            <h5>Contact Seller: <span class="text-content">(+1)-123-456-789</span></h5>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('frontend_assets') }}/images/vegetable/product/23.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 70.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('frontend_assets') }}/images/vegetable/product/24.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Dates Medjoul Premium Imported</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 40.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('frontend_assets') }}/images/vegetable/product/25.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Good Life Walnut Kernels</h6>
                                                    </a>
                                                    <span>200 G</span>
                                                    <h6 class="price theme-color">$ 52.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mb-0">
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('frontend_assets') }}/images/vegetable/product/26.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Apple Red Premium Imported</h6>
                                                    </a>
                                                    <span>1 KG</span>
                                                    <h6 class="price theme-color">$ 80.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Banner Section -->
                        <div class="ratio_156 pt-25">
                            <div class="home-contain">
                                <img src="{{ asset('frontend_assets') }}/images/vegetable/banner/8.jpg"
                                    class="bg-img blur-up lazyload" alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">Seafood</h6>
                                        <h3 class="text-uppercase fw-normal"><span
                                                class="theme-color fw-bold">Freshes</span> Products</h3>
                                        <h3 class="fw-light">every hour</h3>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Releted Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Related Products</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="{{ asset('frontend_assets') }}/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @forelse ($related_products as $related_product)
                            <div>
                                <div class="product-box-3 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('product.details', $related_product->id) }}">
                                                <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\product_photo::where('product_id', $related_product->id)->get()->random()->product_photos }}"
                                                    class="img-fluid blur-up lazyload" alt="Not found">

                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#view">
                                                            <i data-feather="eye"></i>
                                                        </a>
                                                    </li>

                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                        <a href="compare.html">
                                                            <i data-feather="refresh-cw"></i>
                                                        </a>
                                                    </li>

                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist">
                                                        <a href="wishlist.html" class="notifi-wishlist">
                                                            <i data-feather="heart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <a href="{{ route('product.details', $related_product->id) }}">
                                                <h6 class="name">{{ $related_product->product_name }}</h6>
                                            </a>

                                            <h5 class="sold text-content">
                                                @if (lowest_discount_price($related_product->id) == 0)
                                                    <span class="theme-color price">Coming Soon !!</span>
                                                @else
                                                    <span
                                                        class="theme-color price">{{ lowest_discount_price($related_product->id) }}
                                                        taka</span>
                                                    @if (lowest_discount_price($related_product->id) != lowest_regular_price($related_product->id))
                                                        <del class="text-danger">{{ lowest_regular_price($related_product->id) }}
                                                            taka</del>
                                                    @endif
                                                @endif
                                            </h5>

                                            <div class="product-rating mt-sm-2 mt-1">
                                                @if (review_checker($related_product->id))
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= round(reviews($related_product->id)->average('rating')); $i++)
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                        @endfor
                                                        @for ($i = 1; $i <= 5 - round(reviews($related_product->id)->average('rating')); $i++)
                                                            <li>
                                                                <i data-feather="star"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <span>({{ reviews($related_product->id)->average('rating') }})</span>
                                                @endif
                                                @if (stock_checker($related_product->id))
                                                    <br>&nbsp;
                                                    <h6 class="text-success">In Stock</h6>
                                                @else
                                                    @if (lowest_discount_price($related_product->id) == 0)
                                                        <br><br>
                                                        <h6 class="text-danger">Waiting!</h6>
                                                    @else
                                                        <h6 class="text-danger">Stock Out</h6>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="{{ route('product.details', $related_product->id) }}"
                                                    class="btn btn-add-cart">
                                                    Add
                                                </a>
                                                {{-- <button class="btn btn-add-cart addcart-button">Add
                                                    <span class="add-icon bg-light-gray">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </span>
                                                </button> --}}
                                                <div class="cart_qty qty-box">
                                                    <div class="input-group bg-white">
                                                        <button type="button" class="qty-left-minus bg-gray"
                                                            data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                            name="quantity" value="0">
                                                        <button type="button" class="qty-right-plus bg-gray"
                                                            data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger">No Related Products Available !!</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Releted Product Section End -->
@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#color_dropdown').change(function() {
                var product_id = "{{ $product->id }}";
                var color_id = $(this).val();

                // alert(color_id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // ajax code start
                $.ajax({
                    type: 'POST',
                    url: '/get/size/lists',
                    data: {
                        product_id: product_id,
                        color_id: color_id
                    },
                    success: function(data) {
                        // alert(data)
                        $('#add_to_cart').addClass('d-none');
                        $('#discount_price').removeClass('text-danger');
                        $('#discount_price').html('100 taka');
                        $('#size_dropdown').html(data);
                    }
                })
                // ajax code end
            });
            $('#size_dropdown').change(function() {
                var product_id = "{{ $product->id }}";
                var color_id = $('#color_dropdown').val();
                var size_id = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // ajax code start
                $.ajax({
                    type: 'POST',
                    url: '/get/price/quantity',
                    data: {
                        product_id: product_id,
                        color_id: color_id,
                        size_id: size_id,
                    },
                    success: function(data) {
                        if (data.split('#')[2] == 0) {
                            $('#add_to_cart').addClass('d-none');

                            $('#discount_price').addClass('text-danger price');
                            $('#product_stock').addClass('text-danger price');

                            $('#discount_price').html(' Stock Out');
                            $('#product_stock').html(' Stock Out!!');
                        } else {
                            $('#add_to_cart').removeClass('d-none');

                            $('#discount_price').addClass('text-success price');

                            $('#discount_price').html(data.split('#')[0] + ' taka');
                            $('#regular_price').html(data.split('#')[1] + ' taka');
                            $('#product_stock').html(data.split('#')[2] + ' Pics Available');
                        }
                    }
                });
                // ajax code end
            });
            $('#add_to_cart').click(function() {
                var user_input = $('#user_input').val();
                var stock = $('#product_stock').html();

                if (parseInt(user_input) > parseInt(stock)) {
                    Swal.fire(
                        'Warning!',
                        'Stock not Available!',
                        'warning'
                    )
                } else {
                    var product_id = "{{ $product->id }}";
                    var color_id = $('#color_dropdown').val();
                    var size_id = $('#size_dropdown').val();
                    var user_input = user_input;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // ajax code start
                $.ajax({
                    type: 'POST',
                    url: '/add/to/cart',
                    data: {
                        product_id: product_id,
                        color_id: color_id,
                        size_id: size_id,
                        user_input: user_input,
                    },
                    success: function(data) {
                        alert(data)
                    }
                });
                // ajax code end
            });
        });
    </script>
@endsection

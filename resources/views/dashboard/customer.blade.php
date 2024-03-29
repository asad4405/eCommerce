@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>User Dashboard</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="{{ asset('frontend_assets') }}/images/inner-page/cover-img.jpg"
                                    class="img-fluid blur-up lazyload" alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="{{ asset('frontend_assets') }}/images/inner-page/user/1.jpg"
                                            class="blur-up lazyload update_img" alt="">
                                        <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{ auth()->user()->name }}</h3>
                                    <h6 class="text-content">{{ auth()->user()->email }}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button" role="tab"
                                    aria-controls="pills-dashboard" aria-selected="true"><i data-feather="home"></i>
                                    DashBoard</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order"
                                    aria-selected="false"><i data-feather="shopping-bag"></i>Order</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-wishlist" type="button" role="tab"
                                    aria-controls="pills-wishlist" aria-selected="false"><i data-feather="heart"></i>
                                    Wishlist</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"
                                    aria-controls="pills-address" aria-selected="false"><i data-feather="map-pin"></i>
                                    Address</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"><i data-feather="user"></i>
                                    Profile</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button" role="tab"
                                    aria-controls="pills-security" aria-selected="false"><i data-feather="shield"></i>
                                    Privacy</button>
                            </li>

                            <li class="nav-item" role="presentation">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                        class="nav-link" id="pills-out-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-out" type="button" role="tab"
                                        aria-selected="false"><i data-feather="log-out"></i>
                                        Log Out</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                aria-labelledby="pills-dashboard-tab">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>My Dashboard</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('frontend_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Hello, <b
                                                class="text-title">{{ auth()->user()->name }}</b></h6>
                                        <p class="text-content">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('frontend_assets') }}/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('frontend_assets') }}/images/svg/order.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Order</h5>
                                                        <h3>3658</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('frontend_assets') }}/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('frontend_assets') }}/images/svg/pending.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Pending Order</h5>
                                                        <h3>254</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('frontend_assets') }}/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('frontend_assets') }}/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Wishlist</h5>
                                                        <h3>32158</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-title">
                                        <h3>Account Information</h3>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-6">
                                            <div class="dashboard-contant-title">
                                                <h4>Contact Information <a href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editProfile">Edit</a>
                                                </h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">MARK JECNO</h6>
                                                <h6 class="text-content">{{ auth()->user()->email }}</h6>
                                                <a href="javascript:void(0)">Change Password</a>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6">
                                            <div class="dashboard-contant-title">
                                                <h4>Newsletters <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Edit</a></h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">You are currently not subscribed to any
                                                    newsletter</h6>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="dashboard-contant-title">
                                                <h4>Address Book <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Edit</a></h4>
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Default Billing Address</h6>
                                                        <h6 class="text-content">You have not set a default billing
                                                            address.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Edit Address</a>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Default Shipping Address</h6>
                                                        <h6 class="text-content">You have not set a default shipping
                                                            address.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Edit Address</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-wishlist" role="tabpanel"
                                aria-labelledby="pills-wishlist-tab">
                                <div class="dashboard-wishlist">
                                    <div class="title">
                                        <h2>My Wishlist History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('frontend_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row g-sm-4 g-3">
                                        @foreach ($wishlists as $wishlist)
                                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                                <div class="product-box-3 theme-bg-white h-100">
                                                    <div class="product-header">
                                                        <div class="product-image">
                                                            <a
                                                                href="{{ route('product.details', $wishlist->product_id) }}">
                                                                <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $wishlist->product_id)->first()->product_photos }}"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </a>

                                                            <div class="product-header-top">
                                                                <a href="{{ route('wishlist.remove', $wishlist->id) }}"
                                                                    class="btn wishlist-button close_button">
                                                                    <i data-feather="x"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="product-footer">
                                                        <div class="product-detail">
                                                            <span class="span-name">Vegetable</span>
                                                            <a
                                                                href="{{ route('product.details', $wishlist->product_id) }}">
                                                                <h5 class="name">
                                                                    {{ $wishlist->relationToWishlist->product_name }}</h5>
                                                            </a>

                                                            {{-- <h6 class="unit mt-1">250 ml</h6> --}}
                                                            <h5 class="price">
                                                                @if (lowest_discount_price($wishlist->product_id) == 0)
                                                                    <span class="theme-color">Coming Soon !!</span>
                                                                @else
                                                                    <span
                                                                        class="theme-color">{{ lowest_discount_price($wishlist->product_id) }}
                                                                        taka</span>
                                                                    @if (lowest_discount_price($wishlist->product_id) != lowest_regular_price($wishlist->product_id))
                                                                        <del class="text-danger">{{ lowest_regular_price($wishlist->product_id) }}
                                                                            taka</del>
                                                                    @endif
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
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-order" role="tabpanel"
                                aria-labelledby="pills-order-tab">
                                <div class="dashboard-order">

                                    <div class="title">
                                        <h2>My Orders Invoice</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('frontend_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="col-xxl-12 mb-5">
                                        <div class="table-responsive dashboard-bg-box">

                                            <table class="table product-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Invoice/Order ID</th>
                                                        <th scope="col">Total Amount</th>
                                                        <th scope="col">Delivery Charge</th>
                                                        <th scope="col">Payment Option</th>
                                                        <th scope="col">Payment Status</th>
                                                        <th scope="col">Order Time</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($invoices as $invoice)
                                                        <tr>
                                                            <td>#{{ $invoice->id }}</td>
                                                            <td>{{ $invoice->total_amount }}</td>
                                                            <td>{{ $invoice->delivery_cost }}</td>
                                                            <td>{{ $invoice->delivery_option }}</td>
                                                            <td>{{ $invoice->delivery_status }}</td>
                                                            <td>{{ $invoice->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                @if ($invoice->delivery_option == 'online' && $invoice->delivery_status == 'unpaid')
                                                                    <a href="{{ route('pay.now', $invoice->id) }}">Pay Now
                                                                        <i class="fa-brands fa-amazon-pay"></i></a> ||
                                                                @endif
                                                                <a href="{{ route('download.invoice', $invoice->id) }}">Download
                                                                    <i class="fa fa-download"></i></a>
                                                                @if ($invoice->delivery_status == 'paid')
                                                                    ||
                                                                    <a href="{{ route('give.review', $invoice->id) }}">
                                                                        Review
                                                                        <i class="fa fa-star"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr class="text-danger">
                                                            <td colspan="7">Invoice Not Yet !!</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <span class="text-center my-3">
                                                {{ $invoices->links() }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="title">
                                        <h2>My Orders History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('frontend_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-contain">
                                        @forelse ($invoices as $invoice)
                                            <div class="order-box dashboard-bg-box">
                                                <div class="order-container">
                                                    <div class="order-icon">
                                                        <i data-feather="box"></i>
                                                    </div>

                                                    <div class="order-detail">
                                                        <h4>Delivere
                                                            @if ($invoice->delivery_status == 'unpaid')
                                                                <span>Panding</span>
                                                            @else
                                                                <span class="success-bg">Success</span>
                                                            @endif
                                                        </h4>
                                                        <h6 class="text-content">
                                                            Gouda parmesan caerphilly mozzarella
                                                            cottage cheese cauliflower cheese taleggio gouda.
                                                        </h6>
                                                    </div>
                                                </div>

                                                <div class="product-order-detail">
                                                    <a href="{{ route('product.details', $invoice->invoice_detail->relationtoProduct->id) }}"
                                                        class="order-image">

                                                        <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $invoice->invoice_detail->relationtoProduct->id)->first()->product_photos }}"
                                                            class="blur-up lazyload" alt="" width="120">
                                                    </a>

                                                    <div class="order-wrap">
                                                        <a
                                                            href="{{ route('product.details', $invoice->invoice_detail->relationtoProduct->id) }}">
                                                            <h3>{{ $invoice->invoice_detail->relationtoProduct->product_name }}
                                                            </h3>
                                                        </a>
                                                        <p class="text-content">
                                                            {{ $invoice->invoice_detail->relationtoProduct->product_short_details }}
                                                        </p>
                                                        <ul class="product-size">
                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Price : </h6>
                                                                    <h5>{{ $invoice->total_amount }} taka</h5>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Coupon Discount : </h6>
                                                                    <h5>{{ $invoice->coupon_discount_amount }}</h5>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Delivery Charge : </h6>
                                                                    <h5>{{ $invoice->delivery_cost }}</h5>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Total : </h6>
                                                                    <h5>{{ $invoice->sub_total - $invoice->coupon_discount_amount + $invoice->delivery_cost }}
                                                                    </h5>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Sold By : </h6>
                                                                    <h5>{{ $invoice->relationtoVendor->name }}</h5>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Quantity : </h6>
                                                                    <h5>{{ $invoice->invoice_detail->user_input }}</h5>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-address" role="tabpanel"
                                aria-labelledby="pills-address-tab">
                                <div class="dashboard-address">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Address Book</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="{{ asset('frontend_assets') }}/svg/leaf.svg#leaf">
                                                    </use>
                                                </svg>
                                            </span>
                                        </div>

                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal" data-bs-target="#add-address"><i data-feather="plus"
                                                class="me-2"></i> Add New Address</button>
                                    </div>

                                    <div class="row g-sm-4 g-3">
                                        @forelse ($addresses as $address)
                                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                                <div class="address-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="address_id" id="flexRadioDefault2"
                                                                value="{{ $address->id }}"
                                                                {{ $loop->first ? 'checked' : '' }}>
                                                        </div>

                                                        <div class="label">
                                                            <label>{{ $address->tag }}</label>
                                                        </div>

                                                        <div class="table-responsive address-table">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">{{ $address->name }}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Address :</td>
                                                                        <td>
                                                                            <p>{{ $address->address }} </p>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>City :</td>
                                                                        <td>
                                                                            <p>{{ $address->city }} </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                    <tr>
                                                                        <td>Post Code :</td>
                                                                        <td>{{ $address->post_code }}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Phone Number : </td>
                                                                        <td>{{ $address->phone_number }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="button-group">
                                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                            Edit</button>
                                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                            data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                            Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <button class="btn bg-danger text-white btn-sm fw-bold mt-lg-0 mt-3"
                                                    data-bs-toggle="modal"> No Available Address!! Click Here Add New
                                                    Address</button>
                                            </tr>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('frontend_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-detail dashboard-bg-box">
                                        <div class="dashboard-title">
                                            <h3>Profile Name</h3>
                                        </div>
                                        <div class="profile-name-detail">
                                            <div class="d-sm-flex align-items-center d-block">
                                                <h3>{{ auth()->user()->name }}</h3>
                                                <div class="product-rating profile-rating">
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
                                                            <i data-feather="star"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#editProfile">Edit</a>
                                        </div>

                                        <div class="location-profile">
                                            <ul>
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="map-pin"></i>
                                                        <h6>Downers Grove, IL</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="mail"></i>
                                                        <h6>{{ auth()->user()->email }}</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="check-square"></i>
                                                        <h6>Licensed for 2 years</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="profile-description">
                                            <p>Residences can be classified by and how they are connected to
                                                neighbouring residences and land. Different types of housing tenure can
                                                be used for the same physical type.</p>
                                        </div>
                                    </div>

                                    <div class="profile-about dashboard-bg-box">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <div class="dashboard-title mb-3">
                                                    <h3>Profile About</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Gender :</td>
                                                                <td>Female</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Birthday :</td>
                                                                <td>21/05/1997</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone Number :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)"> +91 846 - 547 -
                                                                        210</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address :</td>
                                                                <td>549 Sulphur Springs Road, Downers, IL</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="dashboard-title mb-3">
                                                    <h3>Login Details</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Email :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">{{ auth()->user()->email }}
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">●●●●●●
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-xxl-5">
                                                <div class="profile-image">
                                                    <img src="{{ asset('frontend_assets') }}/images/inner-page/dashboard-profile.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-security" role="tabpanel"
                                aria-labelledby="pills-security-tab">
                                <div class="dashboard-privacy">
                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Privacy</h3>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Allows others to see my profile</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio" aria-checked="false">
                                                    <label class="form-check-label" for="redio"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">all peoples will be able to see my profile</p>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>who has save this profile only that people see my profile</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio2" aria-checked="false">
                                                    <label class="form-check-label" for="redio2"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">all peoples will not be able to see my profile</p>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Save
                                            Changes</button>
                                    </div>

                                    <div class="dashboard-bg-box mt-4">
                                        <div class="dashboard-title mb-4">
                                            <h3>Account settings</h3>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Deleting Your Account Will Permanently</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio3" aria-checked="false">
                                                    <label class="form-check-label" for="redio3"></label>
                                                </div>
                                            </div>
                                            <p class="text-content">Once your account is deleted, you will be logged out
                                                and will be unable to log in back.</p>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Deleting Your Account Will Temporary</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio4" aria-checked="false">
                                                    <label class="form-check-label" for="redio4"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">Once your account is deleted, you will be logged out
                                                and you will be create new account</p>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Delete My
                                            Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->

    <!-- Add address modal box start -->
    <div class="modal fade theme-modal" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ route('add.address') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-4 theme-form-floating">
                            <select name="tag" id="" class="form-select">
                                <option value="Home">Home</option>
                                <option value="Office">Office</option>
                            </select>
                            {{-- <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag"
                                name="tag"> --}}
                            <label for="tag">Tag</label>
                            @error('tag')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-4 theme-form-floating">
                                    <input type="text" name="city"
                                        class="form-control @error('city') is-invalid @enderror" id="city">
                                    <label for="city">City</label>
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-4 theme-form-floating">
                                    <input type="text" name="country"
                                        class="form-control @error('country') is-invalid @enderror" id="country">
                                    <label for="country">Country</label>
                                    @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-4 theme-form-floating">
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                                style="height: 100px"></textarea>
                            <label for="address">Enter Address</label>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control @error('post_code') is-invalid @enderror"
                                name="post_code" id="post_code">
                            <label for="post_code">Post Code</label>
                            @error('post_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone" name="phone_number">
                            <label for="phone">Phone Number</label>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn theme-bg-color btn-md text-white" data-bs-dismiss="modal">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add address modal box end -->

    <!-- Edit Profile Start -->
    @php
        $address = App\Models\Address::where('customer_id', auth()->id())->get();
    @endphp
    @if ($address)
        {{-- <div class="modal fade theme-modal" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form action="{{ route('edit.address', $address->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-4">
                                <div class="modal-body">
                                    <div class="form-floating mb-4 theme-form-floating">
                                        <select name="tag" id="" class="form-select">
                                            <option value="Home">Home</option>
                                            <option value="Office">Office</option>
                                        </select>
                                        <label for="tag">Tag</label>
                                        @error('tag')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-4 theme-form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ $address->customer_id }}">
                                        <label for="name">Name</label>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating mb-4 theme-form-floating">
                                                <input type="text" name="city" value="{{ $address->city }}"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    id="city">
                                                <label for="city">City</label>
                                                @error('city')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-4 theme-form-floating">
                                                <input type="text" name="country" value="{{ $address->country }}"
                                                    class="form-control @error('country') is-invalid @enderror"
                                                    id="country">
                                                <label for="country">Country</label>
                                                @error('country')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-4 theme-form-floating">
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                                            style="height: 100px">{{ $address->address }}</textarea>
                                        <label for="address">Enter Address</label>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-4 theme-form-floating">
                                        <input type="text"
                                            class="form-control @error('post_code') is-invalid @enderror"
                                            name="post_code" id="post_code" value="{{ $address->post_code }}">
                                        <label for="post_code">Post Code</label>
                                        @error('post_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-4 theme-form-floating">
                                        <input type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            id="phone" name="phone_number" value="{{ $address->phone_number }}">
                                        <label for="phone">Phone Number</label>
                                        @error('phone_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-animation btn-md fw-bold"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" data-bs-dismiss="modal"
                                class="btn theme-bg-color btn-md fw-bold text-light">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    @endif
    <!-- Edit Profile End -->
    <!-- Remove Profile Modal Start -->
    <div class="modal fade theme-modal remove-profile" id="removeProfile" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p>The permission for the use/group, preview is inherited from the object, object will create a
                            new permission for this object</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>

                    {{-- <form action="{{ route('remove.address', $address->id) }}" method="POST">
                        @csrf
                        {{ $address->id }}
                        <button type="submit" class="btn theme-bg-color btn-md fw-bold text-light"
                            data-bs-target="#removeAddress" data-bs-toggle="modal">Yes</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade theme-modal remove-profile" id="removeAddress" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box text-center">
                        <h4 class="text-content">It's Removed.</h4>
                    </div>
                </div>
                <div class="modal-footer pt-0">
                    <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Remove Profile Modal End -->

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Edit Card Start -->
    <div class="modal fade theme-modal" id="editCard" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel8">Edit Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-xxl-6">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="finame" value="Mark">
                                    <label for="finame">First Name</label>
                                </div>
                            </form>
                        </div>

                        <div class="col-xxl-6">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="laname" value="Jecno">
                                    <label for="laname">Last Name</label>
                                </div>
                            </form>
                        </div>

                        <div class="col-xxl-4">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <select class="form-select" id="floatingSelect12"
                                        aria-label="Floating label select example">
                                        <option selected>Card Type</option>
                                        <option value="kindom">Visa Card</option>
                                        <option value="states">MasterCard Card</option>
                                        <option value="fra">RuPay Card</option>
                                        <option value="china">Contactless Card</option>
                                        <option value="spain">Maestro Card</option>
                                    </select>
                                    <label for="floatingSelect12">Card Type</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn theme-bg-color btn-md fw-bold text-light">Update Card</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Card End -->
@endsection

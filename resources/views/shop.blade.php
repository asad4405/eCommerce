@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Shop Top Filter</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Top Filter</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="show-button">
                        <div class="top-filter-menu-2">
                            <div class="sidebar-filter-menu" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                                <a href="javascript:void(0)"><i class="fa-solid fa-filter"></i> Filter Menu</a>
                            </div>

                            <div class="ms-auto d-flex align-items-center">
                                <div class="grid-option grid-option-2">
                                    <ul>
                                        <li class="three-grid">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/svg/grid-3.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li class="grid-btn five-grid d-xxl-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/svg/grid-4.svg"
                                                    class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                            </a>
                                        </li>
                                        <li class="five-grid d-xxl-inline-block d-none active">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/svg/grid-5.svg"
                                                    class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                            </a>
                                        </li>
                                        <li class="list-btn">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('frontend_assets') }}/svg/list.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-filter-category" id="collapseExample">
                        <div class="row g-sm-4 g-3">
                            <div class="col-xxl-12 col-md-12">
                                <form action="{{ route('shop') }}" method="GET">
                                    <div class="ms-auto d-flex align-items-center">
                                        <div class="category-dropdown me-md-3">
                                            {{-- <h5 class="text-content">Search :</h5> --}}
                                            <div class="dropdown">
                                                <input type="search" class="form-control" name="q"
                                                    value="@isset($_GET['q']) {{ $_GET['q'] }} @endisset"
                                                    placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="category-dropdown me-md-3">
                                            {{-- <h5 class="text-content">Category :</h5> --}}
                                            <div class="dropdown">
                                                <select name="category_slug" class="form-select">
                                                    <option value="">Choose Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->slug }}"
                                                            @isset($_GET['category_slug']) {{ $_GET['category_slug'] == $category->slug ? 'selected' : '' }} @endisset>
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="category-dropdown me-md-3">
                                            {{-- <h5 class="text-content">Sort By :</h5> --}}
                                            <div class="dropdown">
                                                @if (isset($_GET['order']))
                                                    <select name="order" class="form-select">
                                                        {{-- <select name="order" class="form-select" onchange="this.form.submit()"> --}}
                                                        <option value="">Choose Order</option>
                                                        {{-- <option value="">Popularity</option> --}}
                                                        <option value="lh"
                                                            {{ $_GET['order'] == 'lh' ? 'selected' : '' }}>Low - High
                                                        </option>
                                                        <option value="hl"
                                                            {{ $_GET['order'] == 'hl' ? 'selected' : '' }}>High - Low
                                                        </option>
                                                        <option value="az"
                                                            {{ $_GET['order'] == 'az' ? 'selected' : '' }}>A - Z Order
                                                        </option>
                                                        <option value="za"
                                                            {{ $_GET['order'] == 'za' ? 'selected' : '' }}>Z - A Order
                                                        </option>
                                                    </select>
                                                @else
                                                    <select name="order" class="form-select">
                                                        {{-- <select name="order" class="form-select" onchange="this.form.submit()"> --}}
                                                        <option value="">Choose Order</option>
                                                        {{-- <option value="">Popularity</option> --}}
                                                        <option value="lh">Low - High</option>
                                                        <option value="hl">High - Low</option>
                                                        <option value="az">A - Z Order</option>
                                                        <option value="za">Z - A Order</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="category-dropdown me-md-3">
                                            <div class="dropdown">
                                                <button type="submit"
                                                    class="btn btn-sm bg-primary text-white">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            {{-- <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Pack Size</h3>
                                </div>
                                <ul class="category-list custom-padding custom-height">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="fruit">
                                            <label class="form-check-label" for="fruit">
                                                <span class="name">Fruits & Vegetables</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="cake">
                                            <label class="form-check-label" for="cake">
                                                <span class="name">Bakery, Cake & Dairy</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="behe">
                                            <label class="form-check-label" for="behe">
                                                <span class="name">Beverages</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="snacks">
                                            <label class="form-check-label" for="snacks">
                                                <span class="name">Snacks & Branded Foods</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="beauty">
                                            <label class="form-check-label" for="beauty">
                                                <span class="name">Beauty & Household</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="pets">
                                            <label class="form-check-label" for="pets">
                                                <span class="name">Kitchen, Garden & Pets</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="egg">
                                            <label class="form-check-label" for="egg">
                                                <span class="name">Eggs, Meat & Fish</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="food">
                                            <label class="form-check-label" for="food">
                                                <span class="name">Gourment & World Food</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="care">
                                            <label class="form-check-label" for="care">
                                                <span class="name">Baby Care</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="fish">
                                            <label class="form-check-label" for="fish">
                                                <span class="name">Fish & Seafood</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="marinades">
                                            <label class="form-check-label" for="marinades">
                                                <span class="name">Marinades</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="lamb">
                                            <label class="form-check-label" for="lamb">
                                                <span class="name">Mutton & Lamb</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="other">
                                            <label class="form-check-label" for="other">
                                                <span class="name">Port & other Meats</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="pour">
                                            <label class="form-check-label" for="pour">
                                                <span class="name">Pourltry</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="salami">
                                            <label class="form-check-label" for="salami">
                                                <span class="name">Sausages, bacon & Salami</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Price</h3>
                                </div>
                                <div class="range-slider">
                                    <input type="text" class="js-range-slider" value="">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Discount</h3>
                                </div>
                                <ul class="category-list">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <span class="name">upto 5%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault1">
                                            <label class="form-check-label" for="flexCheckDefault1">
                                                <span class="name">5% - 10%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault2">
                                            <label class="form-check-label" for="flexCheckDefault2">
                                                <span class="name">10% - 15%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault3">
                                            <label class="form-check-label" for="flexCheckDefault3">
                                                <span class="name">15% - 25%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault4">
                                            <label class="form-check-label" for="flexCheckDefault4">
                                                <span class="name">More than 25%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Category</h3>
                                </div>
                                <ul class="category-list custom-padding custom-height">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault5">
                                            <label class="form-check-label" for="flexCheckDefault5">
                                                <span class="name">400 to 500 g</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault6">
                                            <label class="form-check-label" for="flexCheckDefault6">
                                                <span class="name">500 to 700 g</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault7">
                                            <label class="form-check-label" for="flexCheckDefault7">
                                                <span class="name">700 to 1 kg</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault8">
                                            <label class="form-check-label" for="flexCheckDefault8">
                                                <span class="name">120 - 150 g each Vacuum 2 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault9">
                                            <label class="form-check-label" for="flexCheckDefault9">
                                                <span class="name">1 pc</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault10">
                                            <label class="form-check-label" for="flexCheckDefault10">
                                                <span class="name">1 to 1.2 kg</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault11">
                                            <label class="form-check-label" for="flexCheckDefault11">
                                                <span class="name">2 x 24 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault12">
                                            <label class="form-check-label" for="flexCheckDefault12">
                                                <span class="name">2x6 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault13">
                                            <label class="form-check-label" for="flexCheckDefault13">
                                                <span class="name">4x6 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault14">
                                            <label class="form-check-label" for="flexCheckDefault14">
                                                <span class="name">5x6 pcs Multipack</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault15">
                                            <label class="form-check-label" for="flexCheckDefault15">
                                                <span class="name">Combo 2 Items</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault16">
                                            <label class="form-check-label" for="flexCheckDefault16">
                                                <span class="name">Combo 3 Items</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault17">
                                            <label class="form-check-label" for="flexCheckDefault17">
                                                <span class="name">2 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault18">
                                            <label class="form-check-label" for="flexCheckDefault18">
                                                <span class="name">3 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault19">
                                            <label class="form-check-label" for="flexCheckDefault19">
                                                <span class="name">2 pcs Vacuum (140 g to 180 g each
                                                    )</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault20">
                                            <label class="form-check-label" for="flexCheckDefault20">
                                                <span class="name">4 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault21">
                                            <label class="form-check-label" for="flexCheckDefault21">
                                                <span class="name">4 pcs Vacuum (140 g to 180 g each
                                                    )</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault22">
                                            <label class="form-check-label" for="flexCheckDefault22">
                                                <span class="name">6 pcs</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault23">
                                            <label class="form-check-label" for="flexCheckDefault23">
                                                <span class="name">6 pcs carton</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault24">
                                            <label class="form-check-label" for="flexCheckDefault24">
                                                <span class="name">6 pcs Pouch</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>

                    <div
                        class="row g-sm-4 g-3 row-cols-xxl-5 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        @foreach ($products as $product)
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('product.details', $product->id) }}">
                                                @php
                                                    $product_photos = App\Models\Product_photo::where('product_id', $product->id)->get();
                                                @endphp

                                                <img src="{{ asset('uploads/product_photos') }}/{{ $product_photos->random()->product_photos }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

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

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="wishlist.html" class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span
                                                class="span-name">{{ $product->relationToCategory->category_name }}</span>
                                            <a href="{{ route('product.details', $product->id) }}">
                                                <h5 class="name">{{ $product->product_name }}</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">
                                                {{ $product->product_short_details }}
                                            </p>
                                            <div class="product-rating mt-2">
                                                @if (review_checker($product->id))
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
                                                    <span>({{ reviews($product->id)->count() }})</span>
                                                @endif
                                            </div>
                                            <h5 class="price">
                                                @if (lowest_discount_price($product->id) == 0)
                                                    <span class="theme-color">Coming Soon !!</span>
                                                @else
                                                    <span class="theme-color">{{ lowest_discount_price($product->id) }}
                                                        taka</span>
                                                    @if (lowest_discount_price($product->id) != lowest_regular_price($product->id))
                                                        <del class="text-danger">{{ lowest_regular_price($product->id) }}
                                                            taka</del>
                                                    @endif
                                                @endif
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="{{ route('product.details', $product->id) }}"
                                                    class="btn btn-add-cart addcart-button">
                                                    Add
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item" aria-current="page">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection

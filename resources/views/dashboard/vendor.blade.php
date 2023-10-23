@extends('layouts.backend_master')
@section('content')
    <!-- index body start -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <!-- chart caard section start -->
                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 border-0  card-hover card o-hidden">
                        <div class="custome-1-bg b-r-4 card-body">
                            <div class="media align-items-center static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Total Orders</span>
                                    <h4 class="mb-0 counter">
                                        {{ $orders->count() }}
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i class="fa fa-file"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                        <div class="custome-2-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Total Orders Value</span>
                                    <h4 class="mb-0 counter">
                                        {{ $orders->sum('sub_total') }} Taka

                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i class="fa fa-money-bill-wave"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                        <div class="custome-4-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Total Paid Amount</span>
                                    <h4 class="mb-0 counter">
                                        {{ $orders->where('delivery_status', 'paid')->sum('sub_total') }} Taka
                                </div>

                                <div class="align-self-center text-center">
                                    <i class="fa fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                        <div class="custome-4-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Total Unpaid Orders</span>
                                    <h4 class="mb-0 counter">
                                        {{ $orders->where('delivery_status', 'unpaid')->count() }}
                                    </h4>
                                </div>

                                <div class="align-self-center text-center">
                                    <i class="fa fa-not-equal"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 card-hover border-0 card o-hidden">
                        <div class="custome-4-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Total Paid Orders</span>
                                    <h4 class="mb-0 counter">
                                        {{ $orders->where('delivery_status', 'paid')->count() }}
                                    </h4>
                                </div>

                                <div class="align-self-center text-center">
                                    <i class="fa fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- visitors chart start-->
                <div class="col-xxl-4 col-md-6">
                    <div class="h-100">
                        <div class="card o-hidden card-hover">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="card-header-title">
                                        <h4>Paid Vs Unpaid Orders</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="pie-chart">
                                    <div id="pie-chart-visitors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- visitors chart end-->

                <!-- Recent orders start-->
                <div class="col-xl-12">
                    <div class="card o-hidden card-hover">
                        <div class="card-header card-header-top card-header--2 px-0 pt-0">
                            <div class="card-header-title">
                                <h4>Orders By Customers</h4>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div>
                                <div class="table-responsive">
                                    <table class="best-selling-table table border-0">
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td>
                                                        <div class="best-product-box">
                                                            <div class="product-name">
                                                                <h5>Invoice / Order No.</h5>
                                                                <h6>#{{ $order->id }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="best-product-box">
                                                            <div class="product-name">
                                                                <h5>Customer Name</h5>
                                                                <h6>{{ $order->relationtoCustomer->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="product-detail-box">
                                                            <h6>Sub Total</h6>
                                                            <h5>{{ $order->sub_total }}</h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="product-detail-box">
                                                            <h6>Payment Option</h6>
                                                            <h5>{{ $order->delivery_option }}</h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="product-detail-box">
                                                            <h6>Payment Status</h6>
                                                            <h5>{{ $order->delivery_status }}</h5>
                                                        </div>
                                                    </td>

                                                    @if ($order->delivery_status == 'unpaid' && $order->delivery_option == 'cod')
                                                        <td>
                                                            <a href="{{ route('make.paid', $order->id) }}"
                                                                class="btn btn-sm btn-primary">Make Paid</a>
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('order.cancel', $order->id) }}"
                                                                class="btn btn-sm btn-secondary">Cancel</a>
                                                        </td>
                                                    @else
                                                        @if ($order->delivery_status == 'paid' && $order->delivery_option == 'cod')
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-primary text-center">
                                                                    Paid Success
                                                                </button>
                                                            </td>
                                                        @else
                                                            @if ($order->delivery_status == 'paid' && $order->delivery_option == 'online')
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-primary text-center">
                                                                        Paid Success</button>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-info text-center">
                                                                        Paid by User</button>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-danger text-center">
                                                        No Orders By Customer
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <span class="mt-3">
                                        {{ $orders->links() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent orders end-->

                <div class="col-12">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0 pb-1">
                            <div class="card-header-title p-0">
                                <h4>Category</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="category-slider no-arrow">
                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/vegetable.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Vegetables & Fruit</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/cup.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Beverages</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/meats.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Meats & Seafood</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/breakfast.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Breakfast</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/frozen.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Frozen Foods</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/milk.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Milk & Dairies</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/pet.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Pet Food</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/vegetable.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Vegetables & Fruit</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/cup.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Beverages</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/meats.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Meats & Seafood</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/breakfast.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Breakfast</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/frozen.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Frozen Foods</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/milk.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Milk & Dairies</h6>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="{{ asset('backend_assets') }}/svg/pet.svg" class="img-fluid"
                                                alt="">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6>Pet Food</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chart card section End -->


                <!-- Earning chart star-->
                <div class="col-xl-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0 pb-1">
                            <div class="card-header-title">
                                <h4>Revenue Report</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="report-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- Earning chart  end-->


                <!-- Best Selling Product Start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card o-hidden card-hover">
                        <div class="card-header card-header-top card-header--2 px-0 pt-0">
                            <div class="card-header-title">
                                <h4>Best Selling Product</h4>
                            </div>

                            <div class="best-selling-box d-sm-flex d-none">
                                <span>Short By:</span>
                                <div class="dropdown">
                                    <button class="btn p-0 dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" data-bs-auto-close="true">Today</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div>
                                <div class="table-responsive">
                                    <table
                                        class="best-selling-table w-image
                                w-image
                                w-image table border-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="best-product-box">
                                                        <div class="product-image">
                                                            <img src="{{ asset('backend_assets') }}/images/product/1.png"
                                                                class="img-fluid" alt="Product">
                                                        </div>
                                                        <div class="product-name">
                                                            <h5>Aata Buscuit</h5>
                                                            <h6>26-08-2022</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Price</h6>
                                                        <h5>$29.00</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Orders</h6>
                                                        <h5>62</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Stock</h6>
                                                        <h5>510</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Amount</h6>
                                                        <h5>$1,798</h5>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="best-product-box">
                                                        <div class="product-image">
                                                            <img src="{{ asset('backend_assets') }}/images/product/2.png"
                                                                class="img-fluid" alt="Product">
                                                        </div>
                                                        <div class="product-name">
                                                            <h5>Aata Buscuit</h5>
                                                            <h6>26-08-2022</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Price</h6>
                                                        <h5>$29.00</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Orders</h6>
                                                        <h5>62</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Stock</h6>
                                                        <h5>510</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Amount</h6>
                                                        <h5>$1,798</h5>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="best-product-box">
                                                        <div class="product-image">
                                                            <img src="{{ asset('backend_assets') }}/images/product/3.png"
                                                                class="img-fluid" alt="Product">
                                                        </div>
                                                        <div class="product-name">
                                                            <h5>Aata Buscuit</h5>
                                                            <h6>26-08-2022</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Price</h6>
                                                        <h5>$29.00</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Orders</h6>
                                                        <h5>62</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Stock</h6>
                                                        <h5>510</h5>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Amount</h6>
                                                        <h5>$1,798</h5>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Best Selling Product End -->


                <!-- Earning chart star-->
                <div class="col-xl-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0 mb-0">
                            <div class="card-header-title">
                                <h4>Earning</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="bar-chart-earning"></div>
                        </div>
                    </div>
                </div>
                <!-- Earning chart end-->


                <!-- Transactions start-->
                <div class="col-xxl-4 col-md-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="card-header-title">
                                <h4>Transactions</h4>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div>
                                <div class="table-responsive">
                                    <table class="user-table transactions-table table border-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="transactions-icon">
                                                        <i class="ri-shield-line"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Wallets</h6>
                                                        <p>Starbucks</p>
                                                    </div>
                                                </td>

                                                <td class="lost">-$74</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-1">
                                                    <div class="transactions-icon">
                                                        <i class="ri-check-line"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Bank Transfer</h6>
                                                        <p>Add Money</p>
                                                    </div>
                                                </td>

                                                <td class="success">+$125</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-2">
                                                    <div class="transactions-icon">
                                                        <i class="ri-exchange-dollar-line"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Paypal</h6>
                                                        <p>Add Money</p>
                                                    </div>
                                                </td>

                                                <td class="lost">-$50</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-3">
                                                    <div class="transactions-icon">
                                                        <i class="ri-bank-card-line"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Mastercard</h6>
                                                        <p>Ordered Food</p>
                                                    </div>
                                                </td>

                                                <td class="lost">-$40</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-4 pb-0">
                                                    <div class="transactions-icon">
                                                        <i class="ri-bar-chart-grouped-line"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Transfer</h6>
                                                        <p>Refund</p>
                                                    </div>
                                                </td>

                                                <td class="success pb-0">+$90</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Transactions end-->

                <!-- To Do List start-->
                <div class="col-xxl-4 col-md-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="card-header-title">
                                <h4>To Do List</h4>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <ul class="to-do-list">
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Pick up kids from school</strong>
                                        <p>8 Hours</p>
                                    </div>
                                </li>
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault1">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Prepare or presentation.</strong>
                                        <p>8 Hours</p>
                                    </div>
                                </li>
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault2">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Create invoice</strong>
                                        <p>8 Hours</p>
                                    </div>
                                </li>
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault3">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Meeting with Alisa</strong>
                                        <p>8 Hours</p>
                                    </div>
                                </li>

                                <li class="to-do-item">
                                    <form class="row g-2">
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter Task Name">
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary w-100 h-100">Add
                                                task</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- To Do List end-->
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('footer_script')
    <script>
        //pie chart for visitors
        var options = {
            series: [{{ $orders->where('delivery_status', 'paid')->count() }}, {{ $orders->where('delivery_status', 'unpaid')->count() }}],
            labels: ['Paid Order', 'Unpaid Order'],
            chart: {
                width: "100%",
                height: 275,
                type: 'donut',
            },

            legend: {
                fontSize: '12px',
                position: 'bottom',
                offsetX: 1,
                offsetY: -1,

                markers: {
                    width: 10,
                    height: 10,
                },

                itemMargin: {
                    vertical: 2
                },
            },

            colors: ['#28c870', '#ffa044', '#9e65c2', '#6670bd', '#FF9800'],

            plotOptions: {
                pie: {
                    startAngle: -90,
                    endAngle: 270
                }
            },

            dataLabels: {
                enabled: false
            },

            responsive: [{
                    breakpoint: 1835,
                    options: {
                        chart: {
                            height: 245,
                        },

                        legend: {
                            position: 'bottom',

                            itemMargin: {
                                horizontal: 5,
                                vertical: 1
                            },
                        },
                    },
                },

                {
                    breakpoint: 1388,
                    options: {
                        chart: {
                            height: 330,
                        },

                        legend: {
                            position: 'bottom',
                        },
                    },
                },

                {
                    breakpoint: 1275,
                    options: {
                        chart: {
                            height: 300,
                        },

                        legend: {
                            position: 'bottom',
                        },
                    },
                },

                {
                    breakpoint: 1158,
                    options: {
                        chart: {
                            height: 280,
                        },

                        legend: {
                            fontSize: '10px',
                            position: 'bottom',
                            offsetY: 10,
                        },
                    },
                },

                {
                    theme: {
                        mode: 'dark',
                        palette: 'palette1',
                        monochrome: {
                            enabled: true,
                            color: '#255aee',
                            shadeTo: 'dark',
                            shadeIntensity: 0.65
                        },
                    },
                },

                {
                    breakpoint: 598,
                    options: {
                        chart: {
                            height: 280,
                        },

                        legend: {
                            fontSize: '12px',
                            position: 'bottom',
                            offsetX: 5,
                            offsetY: -5,

                            markers: {
                                width: 10,
                                height: 10,
                            },

                            itemMargin: {
                                vertical: 1
                            },
                        },
                    },
                },
            ],
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart-visitors"), options);
        chart.render();


        var optionsLine = {
            chart: {
                height: 350,
                type: "line",
                stacked: true,
                animations: {
                    enabled: true,
                    easing: "linear",
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
                dropShadow: {
                    enabled: true,
                    opacity: 0.3,
                    blur: 5,
                    left: -7,
                    top: 22
                },
                events: {
                    animationEnd: function(chartCtx) {
                        const newData1 = chartCtx.w.config.series[0].data.slice();
                        newData1.shift();
                        const newData2 = chartCtx.w.config.series[1].data.slice();
                        newData2.shift();
                        window.setTimeout(function() {
                            chartCtx.updateOptions({
                                    series: [{
                                            data: newData1
                                        },
                                        {
                                            data: newData2
                                        }
                                    ],
                                    subtitle: {
                                        text: parseInt(getRandom() * Math.random()).toString()
                                    }
                                },
                                false,
                                false
                            );
                        }, 300);
                    }
                },
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: "straight",
                width: 5
            },
            grid: {
                padding: {
                    left: 0,
                    right: 0
                }
            },
            markers: {
                size: 0,
                hover: {
                    size: 0
                }
            },
            series: [{
                    name: "Running",
                    data: generateMinuteWiseTimeSeries(
                        new Date("12/12/2016 00:20:00").getTime(),
                        12, {
                            min: 30,
                            max: 110
                        }
                    )
                },
                {
                    name: "Waiting",
                    data: generateMinuteWiseTimeSeries(
                        new Date("12/12/2016 00:20:00").getTime(),
                        12, {
                            min: 30,
                            max: 110
                        }
                    )
                }
            ],
            xaxis: {
                type: "datetime",
                range: 2700000
            },
            title: {
                text: "Processes",
                align: "left",
                style: {
                    fontSize: "12px"
                }
            },
            subtitle: {
                text: "20",
                floating: true,
                align: "right",
                offsetY: 0,
                style: {
                    fontSize: "22px"
                }
            },
            legend: {
                show: true,
                floating: true,
                horizontalAlign: "left",
                onItemClick: {
                    toggleDataSeries: false
                },
                position: "top",
                offsetY: -33,
                offsetX: 60
            }
        };
    </script>
@endsection

@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
                                    @php
                                        $sub_total = 0;
                                        $flag = false;
                                    @endphp
                                    @forelse ($carts as $cart)
                                        <tr class="product-box-contain">
                                            <td class="product-detail">
                                                <div class="product border-0">
                                                    <a href="{{ route('product.details', $cart->relationtoProduct->id) }}"
                                                        class="product-image">
                                                        <img src="{{ asset('uploads/product_photos') }}/{{ $cart->relationtoProduct_photo->where('product_id', $cart->relationtoProduct->id)->first()->product_photos }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="name">
                                                                <a
                                                                    href="{{ route('product.details', $cart->relationtoProduct->id) }}">{{ $cart->relationtoProduct->product_name }}</a>
                                                            </li>

                                                            <li class="text-content"><span class="text-title">Sold
                                                                    By:</span> {{ $cart->relationtoVendor->name }}</li>

                                                            <li class="text-content"><span class="text-title">Size :</span>
                                                                {{ $cart->relationtoSize->size_name }}
                                                            </li>

                                                            <li>
                                                                <h5 class="text-content d-inline-block">Price :</h5>
                                                                <span>$35.10</span>
                                                                <span class="text-content">$45.68</span>
                                                            </li>

                                                            <li>
                                                                <h5 class="saving theme-color">Saving : $20.68</h5>
                                                            </li>

                                                            <li class="quantity-price-box">
                                                                <div class="cart_qty">
                                                                    <div class="input-group">
                                                                        <button type="button" class="btn qty-left-minus"
                                                                            data-type="minus" data-field="">
                                                                            <i class="fa fa-minus ms-0"
                                                                                aria-hidden="true"></i>
                                                                        </button>
                                                                        <input class="form-control input-number qty-input"
                                                                            type="text" name="" value="0">
                                                                        <button type="button" class="btn qty-right-plus"
                                                                            data-type="plus" data-field="">
                                                                            <i class="fa fa-plus ms-0"
                                                                                aria-hidden="true"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <h5>Total: $35.10</h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>

                                            @php
                                                $inventory = App\Models\Inventory::where([
                                                    'product_id' => $cart->product_id,
                                                    'color_id' => $cart->color_id,
                                                    'size_id' => $cart->size_id,
                                                ])->first();
                                            @endphp

                                            <td class="price">
                                                <h4 class="table-title text-content">Price</h4>
                                                <h5 class="text-success">{{ $inventory->product_discount_price }} taka
                                                    &nbsp;
                                                    @if ($inventory->product_discount_price != $inventory->product_regular_price)
                                                        <del class="text-content text-danger">{{ $inventory->product_regular_price }}
                                                            taka</del>
                                                    @endif
                                                </h5>
                                                <span class="badge bg-warning">Stock:
                                                    {{ $inventory->product_quantity }}</span>
                                                <h6 class="theme-color">Color : {{ $cart->relationtoColor->color_name }}
                                                </h6>
                                            </td>

                                            <td class="quantity">
                                                <h4 class="table-title text-content">
                                                    Qty
                                                    @if ($inventory->product_quantity < $cart->user_input)
                                                        @php
                                                            $flag = true;
                                                        @endphp
                                                        <span class="badge bg-danger">Sold Out</span>
                                                    @endif
                                                </h4>

                                                <div class="quantity-price">
                                                    <div class="cart_qty">
                                                        <form action="{{ route('cart.update') }}" method="POST">
                                                            @csrf
                                                            <div class="input-group">
                                                                <button type="submit" class="btn qty-left-minus"
                                                                    data-type="minus" data-field="">
                                                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                                <input class="form-control input-number qty-input"
                                                                    type="text" name="quantity[{{ $cart->id }}]"
                                                                    value="{{ $cart->user_input }}">

                                                                <button type="submit" class="btn qty-right-plus"
                                                                    data-type="plus" data-field="">
                                                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="subtotal">
                                                <h4 class="table-title text-content">Total</h4>
                                                <h5>{{ $inventory->product_discount_price * $cart->user_input }}</h5>
                                                @php
                                                    $sub_total += $inventory->product_discount_price * $cart->user_input;
                                                @endphp
                                            </td>

                                            <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                                                <a class="remove close_button"
                                                    href="{{ route('cart.remove', $cart->id) }}">Remove</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-danger">
                                                <p class="text-center text-danger">No Products Cart Avaiable!!</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                    @if ($carts->count() != 0)
                                        <tr>
                                            <td>
                                                <a href="{{ route('cart.clear') }}"
                                                    class="btn btn-sm bg-danger text-white">Clear Cart</a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <form action="" method="GET">
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">Coupon Apply</h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="text" class="form-control" id="" name="coupon_name"
                                            placeholder="Enter Coupon Code Here..." value="{{ $coupon_name }}">
                                            {{ session(['S_coupon_name' => $coupon_name]) }}
                                        <button class="btn-apply">Apply</button>
                                    </div>
                                    @if (session('coupon-error'))
                                        <div class="text-danger">{{ session('coupon-error') }}</div>
                                    @endif
                                </div>
                            </form>
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">{{ $sub_total }}</h4>
                                    {{ session(['S_sub_total' => $sub_total]) }}
                                </li>

                                <li>
                                    <h4>Coupon Discount</h4>
                                    <h4 class="price">(-) {{ $coupon_discounts }}%</h4>
                                    {{ session(['S_coupon_discount' => $coupon_discounts]) }}
                                </li>

                                <li>
                                    <h4>Coupon Discount Amount</h4>
                                    @php
                                        $calculated_discount = floor(($sub_total * $coupon_discounts) / 100);
                                    @endphp
                                    <h4 class="price">(-)
                                        @if ($calculated_discount > $highest_discount)
                                            {{ $highest_discount }}
                                            {{ session(['S_coupon_discount_amount' => $highest_discount]) }}
                                        @else
                                            {{ $calculated_discount }}
                                            {{ session(['S_coupon_discount_amount' => $calculated_discount]) }}
                                        @endif
                                    </h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total</h4>
                                <h4 class="price theme-color">
                                    @if ($calculated_discount > $highest_discount)
                                        {{ $sub_total - $highest_discount }}
                                        {{ session(['S_total' => $sub_total - $highest_discount ]) }}
                                    @else
                                        {{ $sub_total - $calculated_discount }}
                                        {{ session(['S_total' => $sub_total - $calculated_discount ]) }}
                                    @endif
                                </h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                @if ($carts->count() != 0)
                                    @if ($flag)
                                        <div class="alert alert-danger">
                                            Please Check your cart for any sold out item.
                                        </div>
                                    @endif
                                    <li>
                                        <button onclick="location.href = '{{ route('checkout') }}';"
                                            class="btn btn-animation proceed-btn fw-bold @if ($flag) disabled @endif ">Process
                                            To Checkout</button>
                                    </li>
                                @endif

                                <li>
                                    <button onclick="location.href = '{{ route('index') }}';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection

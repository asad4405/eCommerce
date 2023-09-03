@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            <form action="{{ route('final.checkout') }}" method="POST">
                @csrf
                <div class="row g-sm-4 g-3">
                    <div class="col-lg-8">
                        <div class="left-sidebar-checkout">
                            <div class="checkout-detail-box">
                                <ul>
                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                trigger="loop-on-hover"
                                                colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Address</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4">
                                                    @foreach ($addresses as $address)
                                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                                            <div class="delivery-address-box">
                                                                <div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="address_id" value="{{ $address->id }}" id="flexRadioDefault1"
                                                                            {{ $loop->first ? 'checked' : '' }}>
                                                                    </div>

                                                                    <div class="label">
                                                                        <label>{{ $address->tag }}</label>
                                                                    </div>

                                                                    <ul class="delivery-address-detail">
                                                                        <li>
                                                                            <h4 class="fw-500">{{ $address->name }}</h4>
                                                                        </li>

                                                                        <li>
                                                                            <p class="text-content"><span
                                                                                    class="text-title">Address
                                                                                    : </span>{{ $address->address }}</p>
                                                                        </li>

                                                                        <li>
                                                                            <p class="text-content"><span
                                                                                    class="text-title">City
                                                                                    : </span>{{ $address->city }}</p>
                                                                        </li>

                                                                        <li>
                                                                            <h6 class="text-content"><span
                                                                                    class="text-title">Post
                                                                                    Code
                                                                                    :</span> {{ $address->post_code }}</h6>
                                                                        </li>

                                                                        <li>
                                                                            <h6 class="text-content mb-0"><span
                                                                                    class="text-title">Phone Number
                                                                                    :</span> {{ $address->phone_number }}
                                                                            </h6>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-xxl-12 col-lg-12 col-md-12">
                                                        <div class="delivery-address-box">
                                                            <a href="{{ route('dashboard') }}"
                                                                class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3">
                                                                <i data-feather="plus" class="me-2"></i> Add New
                                                                Address</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4">
                                                    @foreach ($deliveries as $delivery)
                                                        <div class="col-xxl-6">
                                                            <div class="delivery-option">
                                                                <div class="delivery-category">
                                                                    <div class="shipment-detail">
                                                                        <div
                                                                            class="form-check custom-form-check hide-check-box">
                                                                            <input class="form-check-input choose_delivery"
                                                                                type="radio" name="delivery_cost"
                                                                                value="{{ $delivery->product_delivery_cost }}"
                                                                                {{ $loop->first ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="standard">{{ $delivery->product_delivery_address }}
                                                                                ({{ $delivery->product_delivery_cost }}
                                                                                taka)
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-12 future-box">
                                                        <div class="future-option">
                                                            <div class="row g-md-0 gy-4">
                                                                <div class="col-md-6">
                                                                    <div class="delivery-items">
                                                                        <div>
                                                                            <h5 class="items text-content"><span>3
                                                                                    Items</span>@
                                                                                $693.48</h5>
                                                                            <h5 class="charge text-content">Delivery Charge
                                                                                $34.67
                                                                                <button type="button" class="btn p-0"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Extra Charge">
                                                                                    <i
                                                                                        class="fa-solid fa-circle-exclamation"></i>
                                                                                </button>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <form
                                                                        class="form-floating theme-form-floating date-box">
                                                                        <input type="date" class="form-control">
                                                                        <label>Select Date</label>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Payment Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="accordion accordion-flush custom-accordion"
                                                    id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingFour">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseFour">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="cash"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="online_payment" value="cod" id="cash"
                                                                            checked> Cash On Delivery</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseFour"
                                                            class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="cod-review">Pay digitally with SMS Pay
                                                                    Link. Cash may not be accepted in COVID restricted
                                                                    areas. <a href="javascript:void(0)">Know more.</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingOne">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="credit"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="payment_option" value="online" id="credit">
                                                                        Online Delivery</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <div class="row g-2">
                                                                    <div class="col-12">
                                                                        <div class="payment-method">
                                                                            {{--  --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="right-side-summery-box">
                            <div class="summery-box-2">
                                <div class="summery-header">
                                    <h3>Order Summery</h3>
                                </div>

                                <ul class="summery-contain">
                                    @foreach (carts() as $cart)
                                        <li>
                                            <img src="{{ asset('uploads/product_photos') }}/{{ $cart->relationtoProduct_photo->product_photos }}"
                                                class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                            <h4>{{ $cart->relationtoProduct->product_name }}
                                                {{ $cart->relationtoSize->size_name }} <span>x
                                                    {{ $cart->user_input }}</span>
                                            </h4>
                                            @php
                                                $inventory = App\Models\Inventory::where([
                                                    'product_id' => $cart->product_id,
                                                    'color_id' => $cart->color_id,
                                                    'size_id' => $cart->size_id,
                                                ])->first();
                                            @endphp
                                            <h4 class="price">
                                                {{ $inventory->product_discount_price * $cart->user_input }}
                                            </h4>
                                        </li>
                                    @endforeach
                                </ul>

                                <ul class="summery-total">
                                    <li>
                                        <h4>Subtotal</h4>
                                        <h4 class="price">{{ session('S_sub_total') }}</h4>
                                    </li>

                                    <li>
                                        <h4>Coupon Discount
                                            ({{ session('S_coupon_discount') ? session('S_coupon_discount') : 'N/A' }})
                                        </h4>
                                        <h4 class="price">(-) {{ session('S_coupon_discount') }}%</h4>
                                    </li>

                                    <li>
                                        <h4>Coupon Discount Amount</h4>
                                        <h4 class="price">(-) {{ session('S_coupon_discount_amount') }}</h4>
                                    </li>

                                    <li>
                                        <h4>Shipping</h4>
                                        <h4 class="price">(+)
                                            <span class="delivery_charge">
                                                {{ $delivery_charge = $delivery->first()->product_delivery_cost }}
                                        </h4>
                                        </span>
                                    </li>

                                    <li class="list-total">
                                        <h4>Total </h4>
                                        <p class="d-none total_amount">{{ session('S_total') }}</p>
                                        <h4 class="price final_total_amount">{{ session('S_total') + $delivery_charge }}
                                        </h4>
                                    </li>
                                </ul>
                            </div>

                            <div class="checkout-offer">
                                <div class="offer-title">
                                    <div class="offer-icon">
                                        <img src="{{ asset('frontend_assets') }}/images/inner-page/offer.svg"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="offer-name">
                                        <h6>Available Offers</h6>
                                    </div>
                                </div>

                                <ul class="offer-detail">
                                    <li>
                                        <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                                    </li>
                                    <li>
                                        <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                    </li>
                                </ul>
                            </div>

                            <button type="submit" class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout section End -->
@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            $('.choose_delivery').click(function() {
                $('.delivery_charge').html($(this).val());
                var delivery_charge = parseInt($(this).val());
                var total_amount = parseInt($('.total_amount').html());

                $('.final_total_amount').html(delivery_charge + total_amount);
            });
        });
    </script>
@endsection

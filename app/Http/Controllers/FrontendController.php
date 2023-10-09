<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Http\Requests\FinalCheckoutPostRequest;
use App\Http\Requests\SendOtpPostRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Delivery;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\Invoice_detail;
use App\Models\Otp;
use App\Models\Product;
use App\Models\Product_photo;
use App\Models\Size;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Category::all();
        $modal_products = Product::all();
        return view('index', compact('categories', 'products', 'modal_products'));
    }

    public function about()
    {
        return view('about');
    }

    public function shop(Request $request)
    {
        return $request;
        if ($request->category_slug) {
            $category_id = Category::where('slug', $request->category_slug)->firstOrFail()->id;
            $products = Product::where('category_id', $category_id)->get();
        } else {
            $products = Product::all();
        }
        if ($request->q) {
            $products = Product::where('product_name', 'like', '%' . $request->q . '%')->get();
        }

        if ($request->order) {
            if ($request->order == 'az') {
                $sorted = $products->sortBy('product_name');
                $products = $sorted->values()->all();
            } elseif ($request->order == 'za') {
                $sorted = $products->sortByDesc('product_name');
                $products = $sorted->values()->all();
            }
        }

        $categories = Category::all();

        return view('shop', compact('products', 'categories'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_post(ContactPostRequest $request)
    {
        Contact::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('contact-success', 'Message Send Successfully!');
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        $product_photos = Product_photo::where('product_id', $product->id)->get();
        $vendor = User::find($product->user_id);
        $colors = Inventory::where('product_id', $id)->select('color_id')->distinct()->get();
        $related_products = Product::where('id', '!=', $id)->where('category_id', $product->category_id)->get();
        return view('product_details', [
            'product' => $product,
            'product_photos' => $product_photos,
            'vendor' => $vendor,
            'colors' => $colors,
            'related_products' => $related_products,
        ]);
    }

    public function get_size_lists(Request $request)
    {
        $size_dropdown = "<option>-Select One Size-</option>";
        $sizes = Inventory::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
        ])->get();
        foreach ($sizes as $size) {
            $size_dropdown .= "<option value='$size->size_id'>" . Size::find($size->size_id)->size_name . "</option>";
        }
        return $size_dropdown;
    }

    public function get_price_quantity(Request $request)
    {
        $inventory = Inventory::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ])->first();
        return $inventory->product_discount_price . '#' . $inventory->product_regular_price . '#' . $inventory->product_quantity;
    }

    public function add_to_cart(Request $request)
    {
        if (Cart::where('user_id', auth()->id())->exists()) {
            $vendor_id = Product::find($request->product_id)->user_id;
            if ($vendor_id != Cart::where('user_id', auth()->id())->first()->vendor_id) {
                Cart::where('user_id', auth()->id())->delete();
            }
        }
        if (Cart::where([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ])->exists()) {
            Cart::where([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
            ])->increment('user_input', $request->user_input);
            return 'Update to Cart';
        } else {
            Cart::insert([
                'user_id' => auth()->id(),
                'vendor_id' => Product::find($request->product_id)->user_id,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'user_input' => $request->user_input,
                'created_at' => Carbon::now(),
            ]);
            return 'Add to Cart';
        }
    }

    public function cart(Request $request)
    {
        $highest_discount = 0;
        if ($request->coupon_name) {
            $coupon_name = $request->coupon_name;
            if (Coupon::where('coupon_name', $request->coupon_name)->exists()) {
                $coupon_info = Coupon::where('coupon_name', $request->coupon_name)->first();
                if ($coupon_info->user_id == carts()->first()->vendor_id) {
                    if (Carbon::today()->format('Y-m-d') < $coupon_info->validity) {
                        if ($coupon_info->limit > 0) {
                            $coupon_discounts = $coupon_info->coupon_discount;
                            $highest_discount = $coupon_info->highest_discount;
                        } else {
                            $coupon_discounts = 0;
                            return redirect('cart')->with('coupon-error', 'This Coupon does not Limit!');
                        }
                    } else {
                        $coupon_discounts = 0;
                        return redirect('cart')->with('coupon-error', 'This Coupon does not Valid!');
                    }
                } else {
                    $coupon_discounts = 0;
                    return redirect('cart')->with('coupon-error', 'This Coupon does not belongs to this Vendor!');
                }
            } else {
                $coupon_discounts = 0;
                return redirect('cart')->with('coupon-error', 'This Coupon does not exists!');
            }
        } else {
            $coupon_name = "";
            $coupon_discounts = 0;
        }
        $carts = Cart::where('user_id', auth()->id())->get();
        return view('cart', compact('carts', 'coupon_name', 'coupon_discounts', 'highest_discount'));
    }

    public function add_wishlist(Request $request)
    {
        Wishlist::insert([
            'user_id' => auth()->id(),
            // 'product_id' => ,
            'created_at' => Carbon::now(),
        ]);
        return 'Add to Wishlist';
    }

    public function wishlist()
    {
        return view('wishlist');
    }

    public function checkout()
    {
        if (strpos(url()->previous(), 'cart')) {
            $addresses = Address::where('customer_id', auth()->id())->get();
            $deliveries = Delivery::all();
            return view('checkout', compact('addresses', 'deliveries'));
        } else {
            return redirect('cart');
        }
    }

    public function final_checkout(FinalCheckoutPostRequest $request)
    {
        $invoice_id = Invoice::insertGetId([
            'customer_id' => auth()->id(),
            'vendor_id' => carts()->first()->vendor_id,
            'sub_total' => session('S_sub_total'),
            'coupon_name' => session('S_coupon_name'),
            'coupon_discount' => session('S_coupon_discount'),
            'coupon_discount_amount' => session('S_coupon_discount_amount'),
            'total_amount' => session('S_total'),
            'address_id' => $request->address_id,
            'delivery_cost' => $request->delivery_cost,
            'delivery_option' => $request->payment_option,
            'created_at' => Carbon::now(),
        ]);
        foreach (carts() as $cart) {
            Invoice_detail::insert([
                'invoice_id' => $invoice_id,
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
                'user_input' => $cart->user_input,
                'created_at' => Carbon::now(),
            ]);
            // decrement from inventory
            Inventory::where([
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
            ])->decrement('product_quantity', $cart->user_input);
            // cart empty
            $cart->delete();
        }
        // decrement from coupon limit
        if (session('S_coupon_name')) {
            Coupon::where('coupon_name', session('S_coupon_name'))->decrement('limit');
        }

        if ($request->payment_option == 'online') {
            session(['S_delivery_cost' => $request->delivery_cost]);
            session(['S_invoice_id' => $invoice_id]);
            return redirect('pay');
        }

        return redirect('cart')->with('final-checkout-success', 'Your Order Submitted Successfull!');
    }

    public function cart_remove($id)
    {
        Cart::find($id)->delete();
        return back();
    }

    public function cart_clear()
    {
        Cart::where('user_id', auth()->id())->delete();
        return back();
    }

    public function cart_update(Request $request)
    {
        foreach ($request->quantity as $cart_id => $user_input) {
            Cart::find($cart_id)->update([
                'user_input' => $user_input,
            ]);
        }
        return back();
    }

    public function send_otp(SendOtpPostRequest $request)
    {
        // create otp
        $otp = rand(111111, 999999);

        if (Otp::where('phone_number', $request->phone_number)->exists()) {
            Otp::where('phone_number', $request->phone_number)->delete();
        }
        // store otp in database
        Otp::insert([
            // 'user_id' => auth()->id(),
            'phone_number' => $request->phone_number,
            'otp' => $otp,
            'valid_till' => Carbon::now()->addMinutes(2),
            'created_at' => Carbon::now(),
        ]);

        //send via otp sms

        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "qgaBxl0v5UCdrPXv2dQJ";
        $senderid = "8809617612922";
        $number = "$request->phone_number";
        $message = "Your registration verification code is " . $otp . ". The code is expire in 2 minutes. Please do not share your OTP.";

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        session(['S_otp_phone_number' => $request->phone_number]);
        if (Carbon::now() > Otp::where('phone_number', session('S_otp_phone_number'))->first()->valid_till) {
            return back()->with('otp-valid_till-error', 'OTP is expired, please resend again');
        } else {
            return redirect('submit/otp');
        }
    }

    public function submit_otp()
    {
        return view('otp');
    }

    public function validate_otp(Request $request)
    {
        $flattend = Arr::flatten($request->except('_token'));
        $otp_form_user = implode($flattend);

        if (User::where('email', session('S_otp_phone_number') . '@gmail.com')->exists()) {
            Otp::where('phone_number', session('S_otp_phone_number'))->delete();
            Auth::login(User::where('email', session('S_otp_phone_number') . '@gmail.com')->first());
            return redirect('dashboard');
        } else {
            if (Otp::where([
                'phone_number' => session('S_otp_phone_number'),
                'otp' => $otp_form_user,
            ])->exists()) {
                User::insert([
                    'name' => session('S_otp_phone_number'),
                    'email' => session('S_otp_phone_number') . '@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('new@pass1234'),
                    'phone_number' => session('S_otp_phone_number'),
                    'created_at' => Carbon::now(),
                ]);
                // session(['S_phone_number' => session('S_otp_phone_number')]);
                // session(['S_password' => 'new@pass1234']);
                // delete this otp
                Otp::where('phone_number', session('S_otp_phone_number'))->delete();
                // now login dashboard
                Auth::login(User::where('email', session('S_otp_phone_number') . '@gmail.com')->first());
                return redirect('dashboard');
            } else {
                return back()->with('otp-error', 'Your Otp is wrong, please try again');
            }
        }
    }

    public function resend_otp()
    {
        $resend_otp = rand(111111, 999999);

        //send via otp sms

        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "qgaBxl0v5UCdrPXv2dQJ";
        $senderid = "8809617612922";
        $number = "session('S_otp_phone_number')";
        $message = "Your verification code is " . $resend_otp . ". The code is expire in 2 minutes. Please do not share your OTP.";

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        Otp::where('phone_number', session('S_otp_phone_number'))->update([
            'otp' => $resend_otp,
            'valid_till' => Carbon::now()->addMinutes(2),
        ]);
        if (Carbon::now() > Otp::where('phone_number', session('S_otp_phone_number'))->first()->valid_till) {
            return back()->with('otp-valid_till-error', 'OTP is expired, please resend again');
        } else {
            return redirect('submit/otp');
        }
    }

    public function login_otp(Request $request)
    {
        if (User::where('phone_number', $request->phone_number)->exists()) {
            Otp::where('phone_number', $request->phone_number)->delete();
            $login_otp = rand(111111, 999999);
            Otp::insert([
                'phone_number' => $request->phone_number,
                'otp' => $login_otp,
                'valid_till' => Carbon::now()->addMinutes(2),
                'created_at' => Carbon::now(),
            ]);

            //send via otp sms

            $url = "http://bulksmsbd.net/api/smsapi";
            $api_key = "qgaBxl0v5UCdrPXv2dQJ";
            $senderid = "8809617612922";
            $number = "session('S_otp_phone_number')";
            $message = "Your login verification code is " . $login_otp . ". The code is expire in 2 minutes. Please do not share your OTP.";

            $data = [
                "api_key" => $api_key,
                "senderid" => $senderid,
                "number" => $number,
                "message" => $message
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);

            session(['S_otp_phone_number' => $request->phone_number]);
            if (Carbon::now() > Otp::where('phone_number', session('S_otp_phone_number'))->first()->valid_till) {
                return back()->with('otp-valid_till-error', 'OTP is expired, please resend again');
            } else {
                return redirect('submit/login/otp');
            }
        } else {
            return back()->with('login-otp-error', 'This phone number does not exists');
        }
    }

    public function submit_login_otp()
    {
        return view('login_otp_submit');
    }

    public function login_validate_otp(Request $request)
    {
        $flattend = Arr::flatten($request->except('_token'));
        $otp_form_user = implode($flattend);

        if (Otp::where([
            'phone_number' => session('S_otp_phone_number'),
            'otp' => $otp_form_user,
        ])->exists()) {
            // if otp is expired
            if (Carbon::now() > Otp::where('phone_number', session('S_otp_phone_number'))->first()->valid_till) {
                return back()->with('otp-valid_till-error', 'OTP is expired, please resend again');
            } else {
                // delete this otp
                Otp::where('phone_number', session('S_otp_phone_number'))->delete();
                // now login dashboard
                Auth::login(User::where('email', session('S_otp_phone_number') . '@gmail.com')->first());
                return redirect('dashboard');
            }
        } else {
            return back()->with('login-otp-error', 'Otp is wrong,please try again');
        }
    }
}

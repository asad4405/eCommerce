<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Product_photo;
use App\Models\Size;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Category::all();
        return view('index', compact('categories', 'products'));
    }

    public function about()
    {
        return view('about');
    }

    public function shop()
    {
        return view('shop');
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
        return view('product_details', [
            'product' => $product,
            'product_photos' => $product_photos,
            'vendor' => $vendor,
            'colors' => $colors,
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
        if(Cart::where('user_id',auth()->id())->exists()){
            $vendor_id = Product::find($request->product_id)->user_id;
            if($vendor_id != Cart::where('user_id',auth()->id())->first()->vendor_id){
                Cart::where('user_id',auth()->id())->delete();
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
            ])->increment('user_input',$request->user_input);
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
        if($request->coupon_name){
            $coupon_name = $request->coupon_name;
            if(Coupon::where('coupon_name',$request->coupon_name)->exists()){
                $coupon_info = Coupon::where('coupon_name',$request->coupon_name)->first();
                if($coupon_info->user_id == carts()->first()->vendor_id){
                    if(Carbon::today()->format('Y-m-d') < $coupon_info->validity){
                        if($coupon_info->limit > 0){
                            $coupon_discounts = $coupon_info->coupon_discount;
                            $highest_discount = $coupon_info->highest_discount;
                        }else{
                            $coupon_discounts = 0;
                            return redirect('cart')->with('coupon-error','This Coupon does not Limit!');
                        }
                    }else{
                        $coupon_discounts = 0;
                        return redirect('cart')->with('coupon-error','This Coupon does not Valid!');
                    }
                }else{
                    $coupon_discounts = 0;
                    return redirect('cart')->with('coupon-error','This Coupon does not belongs to this Vendor!');
                }
            }else{
                $coupon_discounts = 0;
                return redirect('cart')->with('coupon-error','This Coupon does not exists!');
            }
        }else{
            $coupon_name = "";
            $coupon_discounts = 0;
        }
        $carts = Cart::where('user_id',auth()->id())->get();
        return view('cart',compact('carts','coupon_name','coupon_discounts','highest_discount'));
    }

    public function cart_remove($id)
    {
        Cart::find($id)->delete();
        return back();
    }

    public function cart_clear()
    {
        Cart::where('user_id',auth()->id())->delete();
        return back();
    }

    public function cart_update (Request $request)
    {
        foreach($request->quantity as $cart_id => $user_input){
            Cart::find($cart_id)->update([
                'user_input' => $user_input,
            ]);
        }
        return back();
    }
}

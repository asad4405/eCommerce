<?php

use App\Models\Cart;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Review;

function cart_amount()
{
    return Cart::where('user_id',auth()->id())->count();
}

function carts()
{
    return Cart::where('user_id',auth()->id())->get();
}

function reviews($product_id)
{
    return Review::where('product_id',$product_id)->get();
}

function review_checker($product_id)
{
    if(Review::where('product_id',$product_id)->exists()){
        return true;
    }else{
        return false;
    }
}

function stock_checker($product_id)
{
    if (Inventory::where('product_id',$product_id)->exists()){
        if(Inventory::where('product_id',$product_id)->sum('product_quantity')){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function lowest_discount_price($product_id)
{
    if (Inventory::where('product_id',$product_id)->exists()){
        return Inventory::where('product_id',$product_id)->min('product_discount_price');
    }else{
        return 0;
    }
}

function lowest_regular_price($product_id)
{
    if (Inventory::where('product_id',$product_id)->exists()){
        return Inventory::where('product_id',$product_id)->min('product_regular_price');
    }else{
        return 0;
    }
}

function product_view($product_id)
{
    return Product::where('id',$product_id)->get() ;
}

<?php

use App\Models\Cart;

function cart_amount()
{
    return Cart::where('user_id',auth()->id())->count();
}
function carts()
{
    return Cart::where('user_id',auth()->id())->get();
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    function relationtoProduct(){
        return $this->hasOne(Product::class, 'id','product_id');
    }
    function relationtoProduct_photo(){
        return $this->hasOne(Product_photo::class, 'id','product_id');
    }
    function relationtoVendor(){
        return $this->hasOne(User::class, 'id','vendor_id');
    }
    function relationtoColor(){
        return $this->hasOne(Color::class, 'id','color_id');
    }
    function relationtoSize(){
        return $this->hasOne(Size::class, 'id','size_id');
    }
}

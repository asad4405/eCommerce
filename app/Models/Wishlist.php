<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    public function relationToWishlist()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    function relationtoColor(){
        return $this->hasOne(Color::class, 'id','color_id');
    }
    function relationtoSize(){
        return $this->hasOne(Size::class, 'id','size_id');
    }
}

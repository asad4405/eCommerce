<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_detail extends Model
{
    use HasFactory;

    public function relationtoProduct()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function relationtoColor()
    {
        return $this->hasOne(Color::class,'id','color_id');
    }
    public function relationtoSize()
    {
        return $this->hasOne(Size::class,'id','size_id');
    }
}

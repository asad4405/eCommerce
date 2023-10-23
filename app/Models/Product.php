<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function relationToCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function relationToInventory(){
        return $this->hasMany(Inventory::class,'product_id','id');
    }
}

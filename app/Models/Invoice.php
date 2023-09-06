<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'delivery_status'
    ];

    public function relationtoVendor()
    {
        return $this->hasOne(User::class,'id','vendor_id');
    }
    public function relationtoCustomer()
    {
        return $this->hasOne(User::class,'id','customer_id');
    }
    public function relationtoAddress()
    {
        return $this->hasOne(Address::class,'id','address_id');
    }
}

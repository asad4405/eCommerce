<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory , SoftDeletes;
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
    public function invoice_detail()
    {
        return $this->hasOne(Invoice_detail::class,'id','invoice_id');
    }
}

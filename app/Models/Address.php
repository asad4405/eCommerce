<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag',
        'name',
        'city',
        'country',
        'address',
        'post_code',
        'phone_number',
    ];
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function vendor_register()
    {
        return view('vendor_register');
    }
    public function vendor_register_post(VendorRegisterRequest $request)
    {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'deleted_at' => Carbon::now(),
            'role' => 'Vendor',
        ]);
        return back()->with('vendor-account-success','Your Application send successfully! After approval you will recieve a confirmation Email!');
    }
}

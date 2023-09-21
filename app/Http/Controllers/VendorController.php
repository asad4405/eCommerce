<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRegisterRequest;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\Invoice_detail;
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
        return back()->with('vendor-account-success', 'Your Application send successfully! After approval you will recieve a confirmation Email!');
    }

    public function make_paid($invoice_id)
    {
        Invoice::find($invoice_id)->update([
            'delivery_status' => 'paid',
        ]);
        return back();
    }

    public function order_cancel($invoice_id)
    {
        if (Invoice::find($invoice_id)) {
            foreach (Invoice_detail::where('invoice_id', $invoice_id)->get() as $invoice_detail) {
                // increment from inventory
                Inventory::where([
                    'product_id' => $invoice_detail->product_id,
                    'color_id' => $invoice_detail->color_id,
                    'size_id' => $invoice_detail->size_id,
                ])->increment('product_quantity', $invoice_detail->user_input);
            }
            Invoice::find($invoice_id)->delete();
        }
        // increment from coupon limit
        if (session('S_coupon_name')) {
            Coupon::where('coupon_name', session('S_coupon_name'))->increment('limit');
        }
        return back();
    }
}

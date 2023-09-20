<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRegisterRequest;
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
            // Inventory::where([
            //     'product_id' => Invoice_detail::find($invoice_id)->product_id,
            //     'color_id' => Invoice_detail::find($invoice_id)->color_id,
            //     'size_id' => Invoice_detail::find($invoice_id)->size_id,
            // ])->increment('product_quantity', Invoice_detail::find($invoice_id)->user_input);
            // Invoice::find($invoice_id)->delete();
            return Invoice_detail::find($invoice_id);
        }
        // return back();
    }
}

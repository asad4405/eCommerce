<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressPostRequest;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\Invoice_detail;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role == 'Admin') {
            $users = User::withTrashed()->get();
            $applied_vendors = User::onlyTrashed()->paginate(5);
            return view('dashboard.admin', compact('applied_vendors', 'users'));
        } else if (auth()->user()->role == 'Vendor') {
            $orders = Invoice::where('vendor_id',auth()->id())->latest()->paginate(5);
            return view('dashboard.vendor',compact('orders'));
        } else {
            $wishlists = Wishlist::where('user_id',auth()->id())->get();
            $addresses = Address::where('customer_id', auth()->id())->get();
            $invoices = Invoice::where('customer_id', auth()->id())->latest()->paginate(5);
            return view('dashboard.customer', compact('addresses', 'invoices','wishlists'));
        }
    }

    public function vendor_appreve($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();
        return back();
    }

    public function add_address(AddressPostRequest $request)
    {
        Address::insert([
            'customer_id' => auth()->id(),
            'tag' => $request->tag,
            'name' => $request->name,
            'city' => $request->city,
            'country' => $request->country,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'phone_number' => $request->phone_number,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('address-success','New Address Added Successfull!!');
    }

    public function edit_address(Request $request, $id)
    {
        Address::find($id)->update([
            'customer_id' => auth()->id(),
            'tag' => $request->tag,
            'name' => $request->name,
            'city' => $request->city,
            'country' => $request->country,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'phone_number' => $request->phone_number,
        ]);
        return back();
    }

    public function remove_address($id)
    {
        Address::find($id)->delete();
        return back();
    }

    public function download_invoice($id)
    {
        $invoice = Invoice::find($id);
        $invoice_details = Invoice_detail::where('invoice_id',$id)->get();
        $pdf = Pdf::loadView('pdf.invoice',compact('invoice','invoice_details'));
        return $pdf->download('invoice_'.Carbon::now()->format('Y_m_d').'.'.'pdf');
    }

    public function all_users()
    {
        $users = User::all();
        return view('backend.users.all_users',compact('users'));
    }

    public function pay_now ($invoice_id)
    {
        session(['S_invoice_id' => $invoice_id]);
        session(['S_total' => Invoice::find($invoice_id)->total_amount]);
        session(['S_delivery_cost' => Invoice::find($invoice_id)->delivery_cost]);
        return redirect('pay');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressPostRequest;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role == 'Admin') {
            $users = User::withTrashed()->get();
            $applied_vendors = User::onlyTrashed()->get();
            return view('dashboard.admin', compact('applied_vendors', 'users'));
        } else if (auth()->user()->role == 'Vendor') {
            return view('dashboard.vendor');
        } else {
            $addresses = Address::where('customer_id', auth()->id())->get();
            $invoices = Invoice::where('customer_id', auth()->id())->latest()->paginate(5);
            return view('dashboard.customer', compact('addresses', 'invoices'));
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
        return back();
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
        $pdf = Pdf::loadView('pdf.invoice',compact('invoice'));
        return $pdf->download('invoice_'.Carbon::now()->format('Y_m_d').'.'.'pdf');
    }
}

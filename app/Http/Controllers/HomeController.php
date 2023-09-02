<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressPostRequest;
use App\Models\Address;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard ()
    {
        if(auth()->user()->role == 'Admin'){
            $users = User::withTrashed()->get();
            $applied_vendors = User::onlyTrashed()->get();
            return view('dashboard.admin',compact('applied_vendors','users'));
        }else if(auth()->user()->role == 'Vendor'){
            return view('dashboard.vendor');
        }else{
            return view('dashboard.customer');
        }
    }
    public function vendor_appreve($id)
    {
        User::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function add_address (AddressPostRequest $request)
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
}

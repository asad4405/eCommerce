<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard ()
    {
        if(auth()->user()->role == 'Admin'){
            $applied_vendors = User::onlyTrashed()->get();
            return view('dashboard.admin',compact('applied_vendors'));
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
}

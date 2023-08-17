<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index ()
    {
        $products = Product::latest()->get();
        $categories = Category::all();
        return view('index',compact('categories','products'));
    }

    public function about ()
    {
        return view('about');
    }

    public function shop ()
    {
        return view('shop');
    }

    public function contact ()
    {
        return view('contact');
    }

    public function contact_post (ContactPostRequest $request)
    {
        Contact::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('contact-success', 'Message Send Successfully!');
    }

    public function product_details()
    {
        return view('product_details');
    }
}

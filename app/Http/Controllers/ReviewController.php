<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewPostRequest;
use App\Models\Inventory;
use App\Models\Invoice_detail;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function give_review ($invoice_id)
    {
        $products = Invoice_detail::where('invoice_id',$invoice_id)->get();
        return view('customer.give_review',compact('products'));
    }
    public function insert_review (ReviewPostRequest $request, $invoice_details_id)
    {
        Review::insert([
            'user_id' => auth()->id(),
            'invoice_details_id' => $invoice_details_id,
            'product_id' => Invoice_detail::find($invoice_details_id)->product_id,
            'rating' => $request->rating,
            'review' => $request->review,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('review-success','Thanks your Feedback !!');
    }
}

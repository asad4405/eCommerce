<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponPostRequest;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::where('user_id',auth()->id())->get();
        return view('backend.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponPostRequest $request)
    {
        Coupon::insert([
            'user_id' => auth()->id(),
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'validity' => $request->validity,
            'limit' => $request->limit,
            'highest_discount' => $request->highest_discount,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('coupon-success','New Coupon Create Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('backend.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->validity = $request->validity;
        $coupon->limit = $request->limit;
        $coupon->highest_discount = $request->highest_discount;
        $coupon->save();
        return redirect('coupon');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back();
    }
}

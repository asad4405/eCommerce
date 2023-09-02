<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDeliveryCostPostRequest;
use App\Models\Delivery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view('backend.delivery.index',compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductDeliveryCostPostRequest $request)
    {
        Delivery::insert([
            'product_delivery_address' => $request->product_delivery_address,
            'product_delivery_cost' => $request->product_delivery_cost,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('product-delivery-cost-success','Product Delivery Cost Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('backend.delivery.edit',compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $delivery->product_delivery_address = $request->product_delivery_address;
        $delivery->product_delivery_cost = $request->product_delivery_cost;
        $delivery->save();
        return redirect('delivery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return back();
    }
}

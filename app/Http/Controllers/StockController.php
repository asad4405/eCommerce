<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::where('vendor_id',auth()->id())->latest()->get();
        return view('backend.product_stock.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('user_id', auth()->id())->get();
        $colors = Color::where('added_by', auth()->id())->get();
        $sizes = Size::where('added_by', auth()->id())->get();
        return view('backend.product_stock.create', compact('products', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);
        if($request->product_regular_price < $request->product_discount_price){
            return back()->with('stock-error', 'Regular Price can not be less then discount price');
        }
        if (Inventory::where([
            'vendor_id' => auth()->id(),
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ])->exists()){
            return back()->with('stock-error','New Stock Already Exists!!');
        } else {
            Inventory::insert([
                'vendor_id' => auth()->id(),
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'product_quantity' => $request->product_quantity,
                'product_regular_price' => $request->product_regular_price,
                'product_discount_price' => $request->product_discount_price,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('stock-success','New Stock Added Successfull!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stock = Inventory::find($id);
        $products = Product::where('user_id', auth()->id())->get();
        $colors = Color::where('added_by', auth()->id())->get();
        $sizes = Size::where('added_by', auth()->id())->get();
        return view('backend.product_stock.edit', compact('stock', 'products', 'colors', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Inventory::find($id)->delete();
        return back();
    }
}

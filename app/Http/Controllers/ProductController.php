<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_photo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPostRequest $request)
    {
        $product_id = Product::insertGetId([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_short_details' => $request->product_short_details,
            'product_long_details' => $request->product_long_details,
            'product_additional_info' => $request->product_additional_info,
            'product_care_instuctions' => $request->product_care_instuctions,
            'created_at' => Carbon::now(),
        ]);

        foreach($request->file('product_photos') as $product_photo){
            // photo upload start
            $product_img = $product_id.'_'.'Product_photo_'.date('d_m_Y_').Str::random(5).'.'.$product_photo->extension();
            Image::make($product_photo)->resize(750,750)->save(base_path('public/uploads/product_photos/'.$product_img));
            // photo upload end
            Product_photo::insert([
                'product_id' => $product_id,
                'product_photos' => $product_img,
                'created_at' => Carbon::now(),
            ]);
        }
        return back()->with('product-success','New Product Added Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // if($request->hasFile('product_photos')){
        // }else{
        // }
        $product->category_id = $request->category_id;
            $product->product_name = $request->product_name;
            $product->product_short_details = $request->product_short_details;
            $product->product_long_details = $request->product_long_details;
            $product->product_additional_info = $request->product_additional_info;
            $product->product_care_instuctions = $request->product_care_instuctions;
            $product->save();
            return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // return unlink(base_path('public/uploads/product_photos/'));
        // $product->delete();
    }
}

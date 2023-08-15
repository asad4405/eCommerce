<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryPostRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deleted_categories = Category::onlyTrashed()->get();
        $categories = Category::all();
        return view('backend.category.index', compact('categories','deleted_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryPostRequest $request)
    {
        // photo upload start
        $category_img = 'Category_' . date('d_m_Y_') . Str::random(5) . '.' . $request->file('category_icon')->getClientOriginalExtension();

        Image::make($request->file('category_icon'))->save(base_path('public/uploads/category_icons/' . $category_img));
        // slug
        $slug = Str::slug($request->category_name);
        // photo upload end
        Category::insert([
            'category_name' => $request->category_name,
            'category_details' => $request->category_details,
            'slug' => $slug,
            'category_icon' => $category_img,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('category-success', 'New Category Added Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if ($request->hasFile('category_icon')) {
            unlink(base_path('public/uploads/category_icons/').$category->category_icon);
            // photo upload start
            $category_img = 'Category_' . date('d_m_Y_') . Str::random(5) . '.' . $request->file('category_icon')->getClientOriginalExtension();

            Image::make($request->file('category_icon'))->save(base_path('public/uploads/category_icons/' . $category_img));
            // slug
            $slug = Str::slug($request->category_name);
            // photo upload end
            $category->category_name = $request->category_name;
            $category->category_details = $request->category_details;
            $category->slug = $slug;
            $category->category_icon = $category_img;
            $category->created_at = Carbon::now();
            $category->save();
            return redirect('category')->with('category-success', 'New Category Added Successfull!');
        } else {
            $slug = Str::slug($request->category_name);

            $category->category_name = $request->category_name;
            $category->category_details = $request->category_details;
            $category->slug = $slug;
            $category->created_at = Carbon::now();
            $category->save();
            return redirect('category')->with('category-success', 'New Category Added Successfull!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // unlink(base_path('public/uploads/category_icons/').$category->category_icon);
        $category->delete();
        return back();
    }

    public function category_restore($id)
    {
        Category::onlyTrashed()->where('id',$id)->restore();
        return back();
    }

    public function category_delete ($id)
    {
        unlink(base_path('public/uploads/category_icons/'). Category::onlyTrashed()->where('id',$id)->first()->category_icon);
        
        Category::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
}

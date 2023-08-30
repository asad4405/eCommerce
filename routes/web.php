<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/post', [FrontendController::class, 'contact_post'])->name('contact.post');

Route::get('/product/details/{id}', [FrontendController::class, 'product_details'])->name('product.details');

Route::post('/get/size/lists', [FrontendController::class, 'get_size_lists'])->name('get.size.lists');
Route::post('/get/price/quantity', [FrontendController::class, 'get_price_quantity'])->name('get.price.quantity');
Route::post('/add/to/cart', [FrontendController::class, 'add_to_cart'])->name('add.to.cart');

Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/cart/remove/{id}', [FrontendController::class, 'cart_remove'])->name('cart.remove');
Route::get('/cart/clear', [FrontendController::class, 'cart_clear'])->name('cart.clear');


Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/vendor/approve/{id}', [HomeController::class, 'vendor_appreve'])->name('vendor.approve')->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/change/profile/photo', [ProfileController::class, 'change_profile_photo'])->name('change.profile.photo');

    // category
    Route::resource('category', CategoryController::class)->middleware('admin.checker');
    Route::get('category/restore/{id}', [CategoryController::class, 'category_restore'])->name('category.restore')->middleware('admin.checker');
    Route::get('category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category.delete')->middleware('admin.checker');

    // Admin
    Route::get('add/new/admin', [AdminController::class, 'add_new_admin'])->name('add.new.admin')->middleware('admin.checker');
    Route::post('add/new/admin/post', [AdminController::class, 'add_new_admin_post'])->name('add.new.admin.post')->middleware('admin.checker');
    Route::get('admin/active/{id}', [AdminController::class, 'admin_active'])->name('admin.active')->middleware('admin.checker');
    Route::get('admin/deactive/{id}', [AdminController::class, 'admin_deactive'])->name('admin.deactive')->middleware('admin.checker');
    Route::get('admin/delete/{id}', [AdminController::class, 'admin_delete'])->name('admin.delete')->middleware('admin.checker');

    // product
    Route::resource('product', ProductController::class)->middleware('vendor.checker');

    // Product Stocks
    Route::resource('stock', StockController::class);

    // Attribute
    Route::resource('attribute', AttributeController::class)->middleware('vendor.checker');
    Route::post('color/store', [AttributeController::class, 'color_store'])->name('color.store');
    Route::post('size/store', [AttributeController::class, 'size_store'])->name('size.store');
    Route::delete('color/delete/{id}', [AttributeController::class, 'color_delete'])->name('color.delete');
    Route::delete('size/delete/{id}', [AttributeController::class, 'size_delete'])->name('size.delete');
});

// vendor
Route::get('/vendor/register', [VendorController::class, 'vendor_register'])->name('vendor.register');
Route::post('/vendor/register/post', [VendorController::class, 'vendor_register_post'])->name('vendor.register.post');

require __DIR__ . '/auth.php';

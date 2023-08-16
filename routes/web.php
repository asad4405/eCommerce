<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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


Route::get('/',[FrontendController::class, 'index'])->name('index');
Route::get('/about',[FrontendController::class, 'about'])->name('about');
Route::get('/shop',[FrontendController::class, 'shop'])->name('shop');
Route::get('/contact',[FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/post',[FrontendController::class, 'contact_post'])->name('contact.post');



Route::get('/dashboard',[HomeController::class ,'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/vendor/approve/{id}',[HomeController::class ,'vendor_appreve'])->name('vendor.approve')->middleware(['auth', 'verified']);

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/change/profile/photo', [ProfileController::class, 'change_profile_photo'])->name('change.profile.photo');

    // category
    Route::resource('category',CategoryController::class)->middleware('admin.checker');
    Route::get('category/restore/{id}',[CategoryController::class,'category_restore'])->name('category.restore')->middleware('admin.checker');
    Route::get('category/delete/{id}',[CategoryController::class,'category_delete'])->name('category.delete')->middleware('admin.checker');

    // product
    Route::resource('product',ProductController::class)->middleware('vendor.checker');
    
});

// vendor
Route::get('/vendor/register',[VendorController::class, 'vendor_register'])->name('vendor.register');
Route::post('/vendor/register/post',[VendorController::class, 'vendor_register_post'])->name('vendor.register.post');

require __DIR__.'/auth.php';

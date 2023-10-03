<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/post', [FrontendController::class, 'contact_post'])->name('contact.post');
Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

Route::get('/product/details/{id}', [FrontendController::class, 'product_details'])->name('product.details');

Route::post('/get/size/lists', [FrontendController::class, 'get_size_lists'])->name('get.size.lists');
Route::post('/get/price/quantity', [FrontendController::class, 'get_price_quantity'])->name('get.price.quantity');
Route::post('/add/to/cart', [FrontendController::class, 'add_to_cart'])->name('add.to.cart');

Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/cart/remove/{id}', [FrontendController::class, 'cart_remove'])->name('cart.remove');
Route::get('/cart/clear', [FrontendController::class, 'cart_clear'])->name('cart.clear');
Route::post('/cart/update', [FrontendController::class, 'cart_update'])->name('cart.update');

Route::get('/checkout',[FrontendController::class, 'checkout'])->name('checkout');
Route::post('/final/checkout',[FrontendController::class, 'final_checkout'])->name('final.checkout');

// Register with phone number start
Route::post('/send/otp',[FrontendController::class, 'send_otp'])->name('send.otp');
Route::get('/submit/otp',[FrontendController::class, 'submit_otp'])->name('submit.otp');
Route::post('/validate/otp',[FrontendController::class, 'validate_otp'])->name('validate.otp');
Route::get('/resend/otp',[FrontendController::class, 'resend_otp'])->name('resend.otp');
Route::post('/login/otp',[FrontendController::class, 'login_otp'])->name('login.otp');
Route::get('/submit/login/otp',[FrontendController::class, 'submit_login_otp'])->name('submit.login.otp');
Route::post('/login/validate/otp',[FrontendController::class, 'login_validate_otp'])->name('login.validate.otp');
// Register with phone number end

// Review
Route::get('/give/review/{invoice_id}',[ReviewController::class, 'give_review'])->name('give.review')->middleware(['auth','verified','customer.checker']);
Route::post('/insert/review/{invoice_details_id}',[ReviewController::class, 'insert_review'])->name('insert.review')->middleware(['auth','verified','customer.checker']);
// Review show admin or vendor dashboard
Route::get('/index/review/',[ReviewController::class, 'index_review'])->name('index.review')->middleware(['auth','verified']);


// Dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/vendor/approve/{id}', [HomeController::class, 'vendor_appreve'])->name('vendor.approve')->middleware(['auth', 'verified']);
// Address
Route::post('/add/address', [HomeController::class, 'add_address'])->name('add.address')->middleware(['auth', 'verified']);
Route::post('/edit/address/{id}', [HomeController::class, 'edit_address'])->name('edit.address')->middleware(['auth', 'verified']);
Route::post('/remove/address/{id}', [HomeController::class, 'remove_address'])->name('remove.address')->middleware(['auth', 'verified']);
// invoice download
Route::get('/download/invoice/{id}', [HomeController::class, 'download_invoice'])->name('download.invoice')->middleware(['auth', 'verified', 'customer.checker']);

Route::get('/pay/now/{invoice_id}',[HomeController::class, 'pay_now'])->name('pay.now')->middleware(['auth','verified']);


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

    // coupon
    Route::resource('coupon',CouponController::class);

    // Delivery Option
    Route::resource('delivery',DeliveryController::class)->middleware('admin.checker');

    // all user
    Route::get('/all/users',[HomeController::class,'all_users'])->name('all.users');
});

// vendor
Route::get('/vendor/register', [VendorController::class, 'vendor_register'])->name('vendor.register');
Route::post('/vendor/register/post', [VendorController::class, 'vendor_register_post'])->name('vendor.register.post');

Route::get('/make/paid/{invoice_id}', [VendorController::class, 'make_paid'])->name('make.paid')->middleware(['auth','verified','vendor.checker']);
Route::get('/order/cancel/{invoice_id}', [VendorController::class, 'order_cancel'])->name('order.cancel')->middleware(['auth','verified','vendor.checker']);

// forgot password Start
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
// forgot password End

// Socialite Login & Register Start
// Gmail
Route::get('google/redirect',[SocialiteController::class,'google_redirect'])->name('google.redirect');
Route::get('google/callback',[SocialiteController::class,'google_callback'])->name('google.callback');

// Github
Route::get('github/redirect',[SocialiteController::class,'github_redirect'])->name('github.redirect');
Route::get('github/callback',[SocialiteController::class,'github_callback'])->name('github.callback');
// Socialite Login & Register  End

// SSLCOMMERZ Start

Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


require __DIR__ . '/auth.php';

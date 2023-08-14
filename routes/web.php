<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
Route::get('/contact',[FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/post',[FrontendController::class, 'contact_post'])->name('contact.post');



Route::get('/dashboard',[HomeController::class ,'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/change/profile/photo', [ProfileController::class, 'change_profile_photo'])->name('change.profile.photo');
});

require __DIR__.'/auth.php';

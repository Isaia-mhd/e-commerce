<?php

use App\Http\Controllers\Products\CategoryController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Socialite\googleOauthController;
use App\Http\Controllers\SubscriberController;
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

Route::get('/', function () {
    return view('Home');
})->name("home");

Route::post("/subscribe", [SubscriberController::class, "subscribe"])->name("subscribe");

// GOOGLE OAUTH
    Route::get("/auth/google", [googleOauthController::class, "googleRedirect",])->name("google.login");
    Route::get("/auth/google/callback", [googleOauthController::class, "googleCallback",]);

// PRODUCTS
    Route::post("/shopping/search/", [ProductController::class, "search",])->name("search");
    Route::get("/shopping", [ProductController::class, "index",])->name("shop");
    Route::get("/shopping/top-cat/{slug}", [ProductController::class, "getTopCategories",])->name("top-category");
    Route::get("/shopping/view/product/{product}", [ProductController::class, "show",])->name("show");
    // For link path at the show page
    Route::get("/shopping/{slug}/{category}", [CategoryController::class, "getMidCategories",])->name("mid-category");
    Route::get("/shopping/{slug}/{midCategory}/{endCategory}", [CategoryController::class, "getEndCategories",])->name("end-category");










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

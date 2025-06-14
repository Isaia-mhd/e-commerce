<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\CategoryController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Socialite\googleOauthController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name("home");

Route::post("/subscribe", [SubscriberController::class, "subscribe"])->name("subscribe");

// GOOGLE OAUTH
    Route::get("/auth/google", [googleOauthController::class, "googleRedirect",])->name("google.login");
    Route::get("/auth/google/callback", [googleOauthController::class, "googleCallback",]);

// PRODUCTS
    Route::post("/shopping/search/", [ProductController::class, "search",])->name("search");
    Route::get("/shopping", [ProductController::class, "index",])->name("shop");
    Route::get("/shopping/tops/{slug}", [ProductController::class, "getTopCategories"])->name("top-category");
    Route::get("/shopping/view/product/{product}", [ProductController::class, "show",])->name("show");
    // For link path at the show page
    Route::get("/shopping/{slug}/{category}", [CategoryController::class, "getMidCategories",])->name("mid-category");
    Route::get("/shopping/{slug}/{midCategory}/{endCategory}", [CategoryController::class, "getEndCategories",])->name("end-category");






Route::middleware('auth')->group(function () {
    Route::get("baskets", [BasketController::class, 'index'])->name("basket.list");
    Route::post("baskets/new/{product}", [BasketController::class, 'store'])->name("basket.new");
    Route::delete("baskets/delete/{basket}", [BasketController::class, 'destroy'])->name("basket.delete");


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/change-password/{user}', [ProfileController::class, 'changePassword'])->name('profile.update.password');
    Route::delete('/profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

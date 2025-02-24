<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/', function () {
    return view('Home');
})->name("home");

// AUTHENTICATION
// Route::middleware(['guest'])->group(function () {
//     Route::get("/register", [RegisteredUserController::class, "create"])->name("register");
//     Route::post("/register", [RegisteredUserController::class, "store"])->name("store");
//     Route::get("/login", [AuthenticatedSessionController::class, "create"])->name("login");
//     Route::post("/login", [AuthenticatedSessionController::class, "store"])->name("logIn");
// });

// Route::middleware(['auth'])->group(function () {
//     Route::post("/logout", [AuthenticatedSessionController::class, "destroy"])->name("logout");

// });










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

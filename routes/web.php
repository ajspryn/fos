<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormSkpdController;
use App\Models\User;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

// Auth routes (replacement for `Auth::routes()` from laravel/ui)
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Register route disabled — user management is admin-only
    // Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('register', [RegisterController::class, 'register']);
});

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->middleware('guest')->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('guest')->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->middleware('guest')->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->middleware('guest')->name('password.update');

Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->middleware('auth')->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm'])->middleware('auth');

Route::get('email/verify', [VerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('user');

// Route::middleware(['auth:sanctum', 'verified'])->resource('/dashboard', DashboardController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/profile', UserController::class);

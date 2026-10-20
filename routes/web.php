<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;


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

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/about', [BlogController::class, 'about'])->name('about');
Route::get('/post', [BlogController::class, 'post'])->name('post');
Route::get('/post/{id}', [BlogController::class, 'postDetail'])->name('post.detail');
Route::get('/contact', [BlogController::class, 'contact'])->name('contact');

Route::view('/login', 'auth.login')->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::view('/register', 'auth.register')->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('auth.register.submit');
Route::view('/forgot-password', 'auth.forgot-password')->name('auth.forgot-password');
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetCode'])
    ->middleware('throttle:3,1')->name('auth.forgot-password.send');
Route::get('/reset-password/{token}', [AuthController::class, 'showPasswordResetForm'])
    ->name('auth.password.reset.form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->middleware('throttle:5,1')->name('auth.password.reset');

//admin katmanı (middleware) ile korunan rotalar burada olacak.
Route::get('/admin', function () {
    abort_unless(in_array(auth()->user()->role, ['admin', 'editor', 'author'], true), 403);

    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

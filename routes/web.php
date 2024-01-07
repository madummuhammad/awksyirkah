<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GoodsCreditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
});
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('post-register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'actionLogin'])->name('post-login');
Route::post('/logout', [LoginController::class, 'actionLogout'])->name('logout');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [ProfileController::class, 'index'])->name('complete-profile');
    Route::resource('/pembiayaan-barang',GoodsCreditController::class);
});
// Route::get('/complete-profile', function () {
//     return view('complete-profile')->name('complete-profile');
// });

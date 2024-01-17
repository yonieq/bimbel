<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryBimbelController;
use App\Http\Controllers\Admin\JadwalBimbelController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\BimbelController;
use App\Http\Controllers\Student\PaymentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('user_admin', AdminController::class);
    Route::resource('student', StudentController::class);
    Route::resource('rekening', RekeningController::class);
    Route::resource('bimbel', CategoryBimbelController::class);
    Route::resource('jadwal_bimbel', JadwalBimbelController::class);
    Route::resource('admin_payment', \App\Http\Controllers\Admin\PaymentController::class);
    Route::resource('admin_register', RegisterController::class);
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting/update', [SettingController::class, 'update'])->name('setting.update');
});

Route::group(['prefix' => 'student'], function () {
    Route::get('bimbel', [BimbelController::class, 'index'])->name('student.bimbel');
    Route::get('bimbel/list', [BimbelController::class, 'list'])->name('bimbel.list');
    Route::get('bimbel/{id}', [BimbelController::class, 'show'])->name('bimbel.show');
    Route::put('bimbel/daftar/{id}', [BimbelController::class, 'bimbel_register'])->name('bimbel.register');
    Route::get('bimbel/payment/{id}', [BimbelController::class, 'confirm_payment'])->name('bimbel.payment');
    Route::put('bimbel/paid/{id}', [BimbelController::class, 'paid'])->name('bimbel.paid');
    Route::resource('payment', PaymentController::class);
});

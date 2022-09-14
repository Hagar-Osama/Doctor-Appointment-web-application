<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
//Doctor Routes
Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function() {
    Route::get('/', [DoctorController::class, 'index'])->name('index');
    Route::get('/create', [DoctorController::class, 'create'])->name('create');
    Route::post('/store', [DoctorController::class, 'store'])->name('store');
    Route::get('/edit/{doctorId}', [DoctorController::class, 'edit'])->name('edit');
    Route::put('/update', [DoctorController::class, 'update'])->name('update');
    Route::delete('/destroy', [DoctorController::class, 'destroy'])->name('destroy');

});


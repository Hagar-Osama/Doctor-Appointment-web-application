<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AuthController;
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

Route::get('/', function(){
    return view('welcome');
});


//Login Routes
Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

///Registeration routes
Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth', 'hasRole:admin']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //Doctor Routes
    Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name('index');
        Route::get('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/store', [DoctorController::class, 'store'])->name('store');
        Route::get('/edit/{doctorId}', [DoctorController::class, 'edit'])->name('edit');
        Route::put('/update', [DoctorController::class, 'update'])->name('update');
        Route::delete('/destroy', [DoctorController::class, 'destroy'])->name('destroy');
    });
});
Route::group(['middleware' => ['auth', 'hasRole:doctor']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //Appointment Routes
    Route::group(['prefix' => 'appointment', 'as' => 'appointment.'], function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('store');
        Route::post('/check', [AppointmentController::class, 'checkAppointnmentTime'])->name('checkTime');
        Route::put('/update', [AppointmentController::class, 'updateTime'])->name('updateTime');
        Route::get('/show/{appoitnmentId}', [AppointmentController::class, 'show'])->name('show');
        // Route::delete('/destroy', [AppointmentController::class, 'destroy'])->name('destroy');
    });
});

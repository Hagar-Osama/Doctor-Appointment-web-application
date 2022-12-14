<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\bookingListController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PrescriptionController;
use App\Http\Controllers\EndUser\HomeController as EndUserHomeController;
use App\Http\Controllers\EndUser\PatientController;
use App\Http\Controllers\EndUser\ProfileController;
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

Route::group(['prefix' => 'endUser', 'as' => 'endUser.'], function () {
    Route::get('/', [EndUserHomeController::class, 'index'])->name('welcome');
    ///Registeration routes
    Route::get('/registerPage', [PatientController::class, 'registerPage'])->name('registerPage');
    Route::post('/register', [PatientController::class, 'register'])->name('register');
    //Login Routes
    Route::get('/loginPage', [PatientController::class, 'loginPage'])->name('loginPage');
    Route::post('/login', [PatientController::class, 'login'])->name('login');
    Route::post('/logout', [PatientController::class, 'logout'])->name('logout');
    ///booking & appointments Routes
    Route::get('/appointment/{doctorId}/{date}', [EndUserHomeController::class, 'makeAppointment'])->name('appointment.book');
    Route::get('/findDoctor', [EndUserHomeController::class, 'findDoctorBasedOnDate'])->name('findDoctor');
    Route::group(['middleware' => ['auth', 'hasRole:patient']], function () {

        Route::post('/book/appointment', [PatientController::class, 'bookAppointment'])->name('bookAppointment');
        Route::get('/mybookings', [PatientController::class, 'showBookings'])->name('myBookings.index');
        Route::get('/myPrescriptions', [PatientController::class, 'getAllMyPrescriptions'])->name('myPrescriptions.index');

        //Profile Routes
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('profile/update/image', [ProfileController::class, 'updateUserImage'])->name('profile.updateImage');
    });
});


//Login Routes
Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

///Registeration routes
Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth', 'hasRole:admin']], function () {
    //Doctor Routes
    Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name('index');
        Route::get('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/store', [DoctorController::class, 'store'])->name('store');
        Route::get('/edit/{doctorId}', [DoctorController::class, 'edit'])->name('edit');
        Route::put('/update', [DoctorController::class, 'update'])->name('update');
        Route::delete('/destroy', [DoctorController::class, 'destroy'])->name('destroy');
    });
     //Department Routes
     Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('index');
        Route::post('/store', [DepartmentController::class, 'store'])->name('store');
        Route::put('/update', [DepartmentController::class, 'update'])->name('update');
        Route::delete('/destroy', [DepartmentController::class, 'destroy'])->name('destroy');
    });
    //booking route
    Route::get('/appointments', [bookingListController::class, 'index'])->name('booking.index');
    Route::get('/all/appointments', [bookingListController::class, 'allBookedAppointments'])->name('allBookings.index');
    Route::get('/filter/patient', [bookingListController::class, 'filterPatient'])->name('patient.filter');
    Route::get('/update/status/{bookingId}', [bookingListController::class, 'updateStatus'])->name('updateStatus');
});
Route::group(['middleware' => ['auth', 'hasRole:doctor']], function () {
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //Appointment Routes
    Route::group(['prefix' => 'appointment', 'as' => 'appointment.'], function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('store');
        Route::post('/check', [AppointmentController::class, 'checkAppointnmentTime'])->name('checkTime');
        Route::put('/update', [AppointmentController::class, 'updateTime'])->name('updateTime');
        Route::get('/show/{appoitnmentId}', [AppointmentController::class, 'show'])->name('show');
    });
    //Prescriptions Route
    Route::group(['prefix' => 'prescriptions', 'as' => 'prescriptions.'], function () {
        Route::get('/', [PrescriptionController::class, 'index'])->name('index');
        Route::get('/create', [PrescriptionController::class, 'create'])->name('create');
        Route::post('/store', [PrescriptionController::class, 'store'])->name('store');
        Route::get('/show/{date}/{userId}', [PrescriptionController::class, 'show'])->name('show');
        Route::get('/prescription/{all', [PrescriptionController::class, 'getAllPrescriptions'])->name('allPrescriptions');



    });
});

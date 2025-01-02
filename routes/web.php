<?php

use App\Models\User;
use App\Services\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PermissionController;
use App\Models\Booking;
use App\Services\DatePicker;
use Illuminate\Notifications\Notification as NotificationsNotification;

Route::middleware(['auth' , 'verified'])->group(function () {
    Route::get('/', function () {return view('dashboard');})->name('home');


    Route::get("reportShow/{carId}",[CustomerController::class, 'show'])->name('show.customer.report');
    // Route::get('pdf', action: [CustomerController::class, 'pdf'])->name('download.pdf');
    Route::group(['prefix' => 'dashboard'], function () {
        // Route::get('admin', [AdminController::class,'show'])->name('admin.show');
        Route::get('report/{carId}', [AdminController::class,'report'])->name('report.form');
        Route::post('reportSend/{id}', [CarController::class, 'store'])->name("store.report");


        //options
        Route::get('options', [OptionsController::class, 'index'])->name('show.options');
        Route::get('options/create', [OptionsController::class, 'create'])->name('create.option');
        Route::post('options/create', [OptionsController::class, 'store'])->name('store.option');
        Route::get("options/{id}", [OptionsController::class, 'edit'])->name('edit.option');
        Route::post("options/{id}/update", [OptionsController::class, 'update'])->name('update.option');


        //users
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users/create', [UserController::class, 'store'])->name('users.store');
        Route::post('users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('users/{user}/edit', [UserController::class, 'update'])->name('users.update');
        //asign role to user
        Route::post('users/{user}/asignRole', [UserController::class, 'assignRole'])->name('users.asignRole');
        //verify phone


        //roles
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');

        Route::get('roles/create', [RoleController::class, 'storePage'])->name('roles.create');
        Route::post('roles/create', [RoleController::class, 'store'])->name('roles.store');

        Route::get("roles/{role}/edit", [RoleController::class, 'edit'])->name('roles.edit');
        Route::post("roles/{role}/edit", [RoleController::class, 'update'])->name('roles.update');

        Route::post("roles/{role}/delete", [RoleController::class, 'destroy'])->name('roles.destroy');


        //permissions
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('permissions/create', [PermissionController::class, 'storePage'])->name('permissions.create');
        Route::post('permissions/create', [PermissionController::class, 'store'])->name('permissions.store');


        //customers
        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');

        Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('customers/create', [CustomerController::class, 'store'])->name('customers.store');

        Route::get('customers/edit', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::post('customers/edit', [CustomerController::class, 'update'])->name('customers.update');

        Route::post('customers/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');
        //Booking
        Route::get('booking/{id}/create', [BookingController::class, 'create'])->name('booking.create');
        Route::post('booking/{id}/store', [BookingController::class, 'store'])->name('booking.store');
        Route::get('reserve/{id}', [CustomerController::class, 'reserveShow'])->name('reserve.show');
        Route::post('reserve/{id}/delete', [CustomerController::class, 'destroy'])->name('reserve.destroy');

        Route::get('/available-times', [DatePicker::class, 'getAvailableTimes']);

    });

//pdf
    Route::get('pdf', [CustomerController::class, 'showPdf'])->name('show.pdf');
    Route::get('/Dpdf/{carId}', [CustomerController::class, 'pdf'])->name('download.pdf');


//notification
    Route::get("sendSMS" , function(){
        $notification = app(Notification::class);
        $user = App\Models\User::find(1);
        $notification->sendSMS($user);        
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
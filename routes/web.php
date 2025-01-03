<?php

use App\Models\User;
use App\Models\Booking;
use App\Services\DatePicker;
use App\Services\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use Illuminate\Notifications\Notification as NotificationsNotification;

Route::middleware(['auth' , 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');


    Route::get("reportShow/{carId}",[CustomerController::class, 'show'])->name('show.customer.report');
    // Route::get('pdf', action: [CustomerController::class, 'pdf'])->name('download.pdf');
    Route::group(['prefix' => 'dashboard'], function () {

        //Users
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/create', [UserController::class, 'store'])->name('users.store');
            Route::post('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/{user}/edit', [UserController::class, 'update'])->name('users.update');
            //asign role to user
            Route::post('/{user}/asignRole', [UserController::class, 'assignRole'])->name('users.asignRole');
        });

        //Roles
        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');

            Route::get('/create', [RoleController::class, 'storePage'])->name('roles.create');
            Route::post('/create', [RoleController::class, 'store'])->name('roles.store');

            Route::get("/{role}/edit", [RoleController::class, 'edit'])->name('roles.edit');
            Route::post("/{role}/edit", [RoleController::class, 'update'])->name('roles.update');

            Route::post("/{role}/delete", [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        //Permissions
        Route::prefix('permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
            Route::get('/create', [PermissionController::class, 'storePage'])->name('permissions.create');
            Route::post('/create', [PermissionController::class, 'store'])->name('permissions.store');
        });

        //Customers
        Route::prefix('customers')->group(function () {
            Route::get('/list', [CustomerController::class, 'list'])->name('customers.index');
            Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
            Route::get('/{name}', [CustomerController::class, 'show'])->name('customers.show');
            Route::post('/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
            Route::post('/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
        }); 

        //Bookings
        Route::prefix("bookings")->group(function () {
            Route::get('/list', [BookingController::class, 'index'])->name('bookings.index');
            // Route::get('/{id}', [BookingController::class, 'show'])->name('bookings.show');

            Route::get('/{id}/create', [BookingController::class, 'create'])->name('bookings.create');
            Route::post('/{id}/store', [BookingController::class, 'store'])->name('bookings.store');

            Route::post('/{id}/update', [BookingController::class, 'update'])->name('bookings.update');

            Route::post('/{id}/delete', [BookingController::class, 'destroy'])->name('bookings.destroy');

            Route::post('/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
            Route::post('/{id}/updateStatus', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
        });

        //Cars
        Route::prefix('cars')->group(function () {
            Route::get('/list', [CarController::class, 'index'])->name('cars.index');
            Route::get('/create', [CarController::class, 'create'])->name('cars.create');
            Route::post('/store', [CarController::class, 'store'])->name('cars.store');
            Route::get('/{id}', [CarController::class, 'show'])->name('cars.show');
            Route::post('/{id}/update', [CarController::class, 'update'])->name('cars.update');
            Route::post('/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
        });

        //Reports
        Route::prefix('reports')->group(function () {
            Route::get('/list', [ReportController::class, 'index'])->name('reports.index');
            Route::get('/{id}', [ReportController::class, 'show'])->name('reports.show');

            Route::get('/create', [ReportController::class, 'create'])->name('reports.create');
            Route::post('/store', [ReportController::class, 'store'])->name('reports.store');

            Route::post('/{id}/update', [ReportController::class, 'update'])->name('reports.update');
            Route::post('/{id}/delete', [ReportController::class, 'destroy'])->name('reports.destroy');
        });

        //Options
        Route::prefix('options')->group(function () {
            Route::get('/', [OptionsController::class, 'index'])->name('show.options');
            Route::get('/create', [OptionsController::class, 'create'])->name('option.create');
            Route::post('/create', [OptionsController::class, 'store'])->name('store.option');
            Route::get("/{id}", [OptionsController::class, 'edit'])->name('edit.option');
            Route::post("/{id}/update", [OptionsController::class, 'update'])->name('update.option');
        });

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
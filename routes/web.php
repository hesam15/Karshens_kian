<?php

use App\Models\User;
use App\Services\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoxesController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\PermissionController;

Route::middleware(['auth' , 'verified'])->group(function () {
    Route::get('/', function () {return view('dashboard');})->name('home');

//customers
    Route::get('form', [CustomerController::class,'form'])->name('customer.form');
    Route::post('storeCustomer' , [CustomerController::class,'store'])->name('storeCustomer.form');

    Route::get("reportShow/{carId}",[CustomerController::class, 'show'])->name('show.customer.report');
    // Route::get('pdf', action: [CustomerController::class, 'pdf'])->name('download.pdf');
    Route::group(['prefix' => 'dashboard', 'middleware' => 'role:admin'], function () {
        Route::get('admin', [AdminController::class,'show'])->name('admin.show');
        Route::get('report/{carId}', [AdminController::class,'report'])->name('report.form');
        Route::post('reportSend/{id}', [CarController::class, 'store'])->name("store.report");

        //options
        Route::get('options', [OptionsController::class, 'index'])->name('show.options');
        Route::get('createOptions', [OptionsController::class, 'create'])->name('add.options.form');
        Route::post('storeOptions', [OptionsController::class, 'store'])->name('store.option');
        Route::get("updateOption/{id}", [OptionsController::class, 'edit'])->name('edit.option');

        //users
        Route::get('users', [UserController::class, 'index'])->name('users.index');

        //permissions
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('users/{user}/edit', [UserController::class, 'update'])->name('users.update');

        //roles
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'storePage'])->name('roles.create');
        Route::post('roles/create', [RoleController::class, 'store'])->name('roles.store');
        Route::get("roles/{role}/edit", [RoleController::class, 'edit'])->name('roles.edit');
        Route::post("roles/{role}/edit", [RoleController::class, 'update'])->name('roles.update');

        //permissions
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('permissions/create', [PermissionController::class, 'storePage'])->name('permissions.create');
        Route::post('permissions/create', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    });

//pdf
    Route::get('pdf', [CustomerController::class, 'showPdf'])->name('show.pdf');
    Route::get('/Dpdf/{carId}', [CustomerController::class, 'pdf'])->name('download.pdf');


//notification
    Route::get("sendSMS" , function(){
        $notification = app(App\Services\Notification::class);
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

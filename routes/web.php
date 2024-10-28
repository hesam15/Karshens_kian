<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoxesController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpensesController;

Route::middleware(['auth' , 'verified'])->group(function () {
    Route::get('/', function () {return view('dashboard');})->name('home');

//customers
    Route::get('form', [CustomerController::class,'show'])->name('customer.form');
    Route::post('storeCustomer' , [CustomerController::class,'store'])->name('storeCustomer.form');

//admin
    Route::get('admin', [AdminController::class,'show'])->name('admin.show');
    Route::get('report', [AdminController::class,'report'])->name('report.form');
    Route::post('sendReport', [CarController::class, 'store'])->name("store.report");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

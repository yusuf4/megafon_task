<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Invoice\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'index')->name('login');
    Route::post('/login', 'login')->name('login.auth');
    Route::post('logoute', 'logout')->name('logoute');
});
Route::middleware('auth')->group(function(){


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');

    // User
    Route::controller(UserController::class)->group(function(){
        Route::get('/user/list', 'index')->name('user.index');
        Route::get('/user/add', 'create')->name('adduser');
        Route::post('/user/store', 'store')->name('user.store');
        Route::get('/user/{id}/edit', 'edit')->name('user.edit');
        Route::put('/user/{id}','update')->name('user.update');
        Route::delete('/user/delete/{id}','destroy')->name('user.delete');
    });


    // Invoice
    Route::controller(InvoiceController::class)->group(function (){
        Route::get('/invoice/list', 'index')->name('invoice.index');
        Route::get('/invoice/create', 'create')->name('invoice.create');
        Route::post('/invoice/store', 'store')->name('invoice.store');
        Route::get('/invoice/{id}/edit', 'edit')->name('invoice.edit');
        Route::put('/invoice/{id}','update')->name('invoice.update');
        Route::delete('/invoice/delete/{id}','destroy')->name('invoice.delete');

    });

});


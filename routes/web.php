<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

});     

// Route::middleware(['auth'])->group(function () {

//     Route::get('/', [LeadController::class, 'index']);

//     Route::resource('leads', LeadController::class);

//     Route::post('/lead-status-update/{id}', [LeadController::class, 'statusUpdate']);

//     Route::get('/search-leads', [LeadController::class, 'search']);
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

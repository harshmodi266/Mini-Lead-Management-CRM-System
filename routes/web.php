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

// leads
Route::middleware(['auth'])->group(function () {

    Route::resource('leads', LeadController::class);

// search
Route::get('/search-leads', [LeadController::class, 'search']);

// Filter Leads by Status
Route::get('/filter-leads', [LeadController::class, 'filter']);

// status
Route::post('/lead-status-update/{id}', [LeadController::class, 'statusUpdate']);
});

// Route::middleware(['auth'])->group(function () {

//     Route::get('/', [LeadController::class, 'index']);

//     Route::resource('leads', LeadController::class);

//     Route::post('/lead-status-update/{id}', [LeadController::class, 'statusUpdate']);

//     Route::get('/search-leads', [LeadController::class, 'search']);
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
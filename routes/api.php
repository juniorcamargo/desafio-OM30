<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::controller(PatientController::class)->group(function () {
    Route::get('/patient', 'index');
    Route::get('/patient/search/', 'search');
    Route::get('/patient/{id}', 'show');
    Route::post('/patient', 'store');
    Route::patch('/patient/{id}', 'update');
    Route::delete('/patient/{id}', 'destroy');
    Route::post('/patient/{id}', 'restore');
});

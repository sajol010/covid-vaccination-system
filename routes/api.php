<?php

use App\Http\Controllers\VaccineCenterController;
use App\Http\Controllers\VaccineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'vaccines'], function () {
    Route::post('/register', [VaccineController::class, 'register']);
    Route::get('/status/{nid}', [VaccineController::class, 'checkStatus']);
});

Route::get('/vaccine-centers', [VaccineCenterController::class, 'index']);

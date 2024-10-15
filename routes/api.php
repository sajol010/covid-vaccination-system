<?php

use App\Http\Controllers\{RegistrantController, VaccineCenterController, VaccineController};
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'vaccines'], function () {
    Route::post('/register', [VaccineController::class, 'register']);
    Route::get('/status/{nid}', [VaccineController::class, 'checkStatus']);
});

Route::get('/vaccine-centers', [VaccineCenterController::class, 'index']);

Route::group(['prefix' => 'registrants'], function () {
    Route::get('', [RegistrantController::class, 'index']);
    Route::put('/{id}/mark-as-vaccinated', [RegistrantController::class, 'markAsVaccinated']);

});

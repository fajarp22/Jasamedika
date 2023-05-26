<?php

// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PasienController;

Route::prefix('kelurahan')->group(function () {
    Route::post('/', [KelurahanController::class, 'create']);
    Route::put('/{id}', [KelurahanController::class, 'update']);
    Route::delete('/{id}', [KelurahanController::class, 'delete']);
    Route::get('/{id}', [KelurahanController::class, 'getById']);
    Route::get('/', [KelurahanController::class, 'getAll']);
});

Route::prefix('pasien')->group(function () {
    Route::post('/', [PasienController::class, 'create']);
    Route::put('/{id}', [PasienController::class, 'update']);
    Route::delete('/{id}', [PasienController::class, 'delete']);
    Route::get('/{id}', [PasienController::class, 'getById']);
    Route::get('/', [PasienController::class, 'getAll']);
});

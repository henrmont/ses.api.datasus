<?php

use App\Http\Controllers\SigtapController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['api', Auth::class])
    ->controller(SigtapController::class)
    ->group(function () {
        Route::post('process', 'process');
    });

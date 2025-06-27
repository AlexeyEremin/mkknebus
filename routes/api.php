<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckApiKey;


Route::middleware(CheckApiKey::class)->group(function () {
    Route::post('/building/search', [BuildingController::class, 'search']);
    Route::resource('building', BuildingController::class);
    Route::get('/building/{building}/organizations', [BuildingController::class, 'organizations']);


    Route::get('/organization/search', [OrganizationController::class, 'search']);
    Route::resource('organization', OrganizationController::class);

    Route::resource('activity', ActivityController::class);
    Route::get('/activity/{activity}/organizations', [ActivityController::class, 'organizations']);
    Route::get('/activity/{activity}/search', [ActivityController::class, 'search']);

});

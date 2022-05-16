<?php

use AhmetBarut\LaravelAutoFactory\Controllers\AutoFactoryController;
use Illuminate\Support\Facades\Route;

Route::get('/auto-factory', [AutoFactoryController::class, 'index'])
    ->name('tables.show');

Route::get('/auto-factory/{table}', [AutoFactoryController::class, 'create'])
    ->name('laravel-auto-factory.tables.show');

Route::post('/auto-factory/{table}', [AutoFactoryController::class, 'store'])
    ->name('laravel-auto-factory.tables.store');

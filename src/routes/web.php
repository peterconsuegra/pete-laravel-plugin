<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Pete\LaravelImport\Http\LaravelImportController as LimportController;

Route::middleware(['web'])
    ->prefix('wordpress-plus-laravel')
    ->name('wpl.')
    ->group(function (): void {
        Route::get('/', [LimportController::class, 'index'])->name('index');
        Route::get('/create', [LimportController::class, 'create'])->name('create');
        Route::post('/', [LimportController::class, 'store'])->name('store');
        Route::get('/logs/{id}', [LimportController::class, 'logs'])->whereNumber('id')->name('logs');

        Route::post('/delete', [LimportController::class, 'delete'])->name('delete');
        Route::post('/generate-ssl', [LimportController::class, 'generateSsl'])->name('generate-ssl');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ModuleController::class, 'index'])->name('modules.index');
Route::get('modules/create', [ModuleController::class, 'create'])->name('modules.create');
Route::post('modules', [ModuleController::class, 'store'])->name('modules.store');
Route::get('modules/{id}', [ModuleController::class, 'show'])->name('modules.show');

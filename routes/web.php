<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabunganController;

Route::get('/read', [TabunganController::class, 'read'])->name('read');
Route::get('/edit', [TabunganController::class, 'edit'])->name('edit');
Route::post('/save', [TabunganController::class, 'save'])->name('save');
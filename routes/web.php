<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabunganController;

Route::get('/read', [TabunganController::class, 'read'])->name('read');
Route::get('/edit', [TabunganController::class, 'edit'])->name('edit');
Route::post('/save', [TabunganController::class, 'save'])->name('save');
Route::get('/upload', [TabunganController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [TabunganController::class, 'uploadFile'])->name('upload.file');
Route::get('/download', [TabunganController::class, 'downloadFile'])->name('download.file');
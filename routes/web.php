<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;

Route::get('/', function () {
    return view('home.index');
});





Route::get('/ads', [AdController::class, 'index'])->name('ads.index');
Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');
Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::put('/ads/{ad}', [AdController::class, 'update'])->name('ads.update');
Route::delete('/ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');
Route::get('/{slug}', [AdController::class, 'preview'])->name('ads.preview');
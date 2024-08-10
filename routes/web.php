<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\AkunController;

Route::get('/', function () {
    return view('admin.page');
});

Route::get('/buatakun', [AkunController::class, 'index']);
Route::post('create/buatakun', [AkunController::class, 'create']);

Route::get('/jurnal', [JurnalController::class, 'index']);
Route::post('create/jurnal', [JurnalController::class, 'create']);
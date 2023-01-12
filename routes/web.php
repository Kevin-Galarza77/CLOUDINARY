<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;




Route::get('/',[ProductoController::class,'index'])->name('home');
Route::resource('producto',ProductoController::class);





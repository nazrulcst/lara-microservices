<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('products',[ProductController::class,'index']);
Route::post('products/{id}/like',[ProductController::class,'like']);

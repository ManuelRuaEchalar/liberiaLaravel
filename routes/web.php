<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialController;

Route::resource('libros', LibroController::class);
Route::resource('editoriales', EditorialController::class);

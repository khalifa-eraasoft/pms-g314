<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoryController::class, 'index'])
    ->name("categories.index");

Route::get('/create', [CategoryController::class, 'create'])
    ->name("categories.create");

Route::post("/store", [CategoryController::class, 'store'])
    ->name("categories.store");

Route::get('/edit/{id}', [CategoryController::class, 'edit'])
    ->name("categories.edit");

Route::get("/show/{id}", [CategoryController::class, 'show'])
    ->name("categories.show");

Route::post("/update/{id}", [CategoryController::class, 'update'])
    ->name("categories.update");

Route::get("/delete/{id}", [CategoryController::class, 'delete'])
    ->name("categories.delete");

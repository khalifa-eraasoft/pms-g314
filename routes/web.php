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

Route::get('/categories', [CategoryController::class, 'index'])
    ->name("categories.index");

Route::get('/create', [CategoryController::class, 'create'])
    ->name("categories.create");

Route::post("/store", [CategoryController::class, 'store'])
    ->name("categories.store");

Route::get('/edit/{id}', [CategoryController::class, 'edit'])
    ->name("categories.edit");

Route::get("/show/{category}", [CategoryController::class, 'show'])
    ->name("categories.show");

Route::put("/update/{id}", [CategoryController::class, 'update'])
    ->name("categories.update");

Route::delete("/delete/{id}", [CategoryController::class, 'delete'])
    ->name("categories.delete");


// when creat a category for example
// required.
// migration file ( create_categories_table )
// category controller ( CategoryController )
// Route ( 7 routes )
// view ( 3 views ) ( index, create, edit )
// model ( Category )
// Op.
// factory ( CategoryFactory )
// seeder ( CategorySeeder )
// DataBaseSeeder ( CategorySeeder )

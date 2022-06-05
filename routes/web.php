<?php

use App\Http\Controllers\SachController;
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
Route::resource('book', SachController::class);

Route::prefix('/book')->group(function () {
    Route::name('book.')->group(function () {
        Route::get('/all/get', [SachController::class, 'getAll'])->name('all');

    });

});

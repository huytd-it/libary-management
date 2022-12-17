<?php

use App\Http\Controllers\PhieuMuonTraController;
use App\Http\Controllers\SachController;
use App\Models\PhieuMuonTra;
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
Route::resources([
    'books' => SachController::class,
    'phieu-muon-tra' => PhieuMuonTraController::class,
]);

Route::prefix('/books')->group(function () {
    Route::name('books.')->group(function () {
        Route::get('/all/get', [SachController::class, 'getAll'])->name('all');

    });

});

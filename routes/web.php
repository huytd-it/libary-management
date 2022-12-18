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
    'sach' => SachController::class,
    'phieu-muon-tra' => PhieuMuonTraController::class,
]);

Route::prefix('/sach')->group(function () {
    Route::name('sach.')->group(function () {
        Route::get('/all/get', [SachController::class, 'getAll'])->name('all');

    });

});
Route::prefix('/phieu-muon-tra')->group(function () {
    Route::name('phieu-muon-tra.')->group(function () {
        Route::get('/all/get', [PhieuMuonTraController::class, 'getAll'])->name('all');

    });

});

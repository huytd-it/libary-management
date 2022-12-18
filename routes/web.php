<?php

use App\Http\Controllers\DangNhapController;
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

Route::get('dang-nhap', function () {
    return view('dang-nhap');
});
Route::get('/', function () {
    return view('dang-nhap');
})->name('home');
Route::get('dang-xuat', [DangNhapController::class, 'logout'])->name('dang-xuat');
Route::prefix('/api')->group(function () {
    Route::name('api.')->group(function () {
        Route::post('dang-nhap', [DangNhapController::class, 'login'])->name('dang-nhap');

    });

});

Route::middleware(['web', 'guest'])->group(function () {
    Route::prefix('/')->group(function () {
        Route::name('admin.')->group(
            function () {
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
            }
        );
    });
});


<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\DocGiaController;
use App\Http\Controllers\LoaiSachController;
use App\Http\Controllers\PhieuMuonTraController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TaiKhoanController;
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
                    'tai-khoan' => TaiKhoanController::class,
                    'doc-gia' => DocGiaController::class,
                    'loai-sach' => LoaiSachController::class,
                    'cai-dat' => SettingController::class
                ]);

                Route::prefix('/sach')->group(function () {
                    Route::name('sach.')->group(function () {
                        Route::get('/all/get', [SachController::class, 'getAll'])->name('all');
                    });
                });
                Route::prefix('/loai-sach')->group(function () {
                    Route::name('loai-sach.')->group(function () {
                        Route::get('/all/get', [LoaiSachController::class, 'getAll'])->name('all');
                    });
                });
                Route::prefix('/phieu-muon-tra')->group(function () {
                    Route::name('phieu-muon-tra.')->group(function () {
                        Route::get('/all/get', [PhieuMuonTraController::class, 'getAll'])->name('all');
                    });
                });
                Route::prefix('/tai-khoan')->group(function () {
                    Route::name('tai-khoan.')->group(function () {
                        Route::get('/all/get', [TaiKhoanController::class, 'getAll'])->name('all');
                    });
                });
                Route::prefix('/doc-gia')->group(function () {
                    Route::name('doc-gia.')->group(function () {
                        Route::get('/all/get', [DocGiaController::class, 'getAll'])->name('all');
                    });
                });
            }
        );
    });
});


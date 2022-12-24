<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangNhapController extends Controller
{
    public function index()
    {
        return view('dang-nhap');
    }
    public function login(Request $request)
    {


        $username = $request->ten_tai_khoan;
        $password = $request->mat_khau;
        $remember = $request->remember_me == NULL ? false : true;



        if (Auth::attempt(['ten_tai_khoan' => $username, 'password' => $password, 'trang_thai' => 1], $remember)) {
            return response()->json([
                'message' => 'Đăng nhập thành công',
                'redirect' => route('admin.sach.index')
            ]);
        }

        return response()->json([
            'message' => 'Đăng nhập thất bại'
        ], 400);
    }
    public function username()
    {
        return 'ten_tai_khoan';
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DocGia;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DocGiaController extends Controller
{

    private $setting;
    public function __construct() {
        $this->setting = Setting::getSetting();
    }
    public function index()
    {



        return view(
            'doc-gia'

        );
    }
    public function getAll()
    {

        $docGia = DB::table('doc_gias as D')->whereNull('D.deleted_at')->get();

        return DataTables::of($docGia)->make(true);
    }
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'ten_doc_gia' => 'required',
            'ngay_sinh' => 'required',
            'created_at' => 'required',
            'ma_loai' => 'required',
            'email' => 'required',
            'dia_chi' => 'required',
        ]);
        if(count($validator->errors()) > 0) {
            return response()->json(['errors' => $validator->errors()], 400);
        }



        $data = [
            'ten_doc_gia' => $request->ten_doc_gia,
            'ngay_sinh' => $request->ngay_sinh,
            'created_at' => $request->created_at,
            'ma_loai' => $request->ma_loai,
            'dia_chi' => $request->dia_chi,
            'email' => $request->email
        ];

        //Kiểm tra ngày sinh có từ 18 - 35 tuổi ko

        $tuoi_toi_thieu = $this->setting["tuoi_toi_thieu"];
        $tuoi_toi_da = $this->setting["tuoi_toi_da"];

        $ngay_sinh = Carbon::parse($request->ngay_sinh);
        $tuoi = $ngay_sinh->diffInYears(Carbon::now());

        if($tuoi < $tuoi_toi_thieu || $tuoi > $tuoi_toi_da) {
            return response()->json(['message' => "Bạn đọc phải từ {$tuoi_toi_thieu}  đến {$tuoi_toi_da} tuổi"], 400);
        }

        $exist = DocGia::where('ma_doc_gia', $request->ma_doc_gia)->first();


   
        if (isset($exist)) {
            $data['update_by'] = Auth::user()->ma_tai_khoan;
            $msg = ['message' => 'Cập nhật độc giả thành công'];
        }else {

            $data['update_by'] = Auth::user()->ma_tai_khoan;
            $data['create_by'] = Auth::user()->ma_tai_khoan;
            $msg = ['message' => 'Thêm độc giả thành công'];
        }


        $tai_khoan =  DocGia::updateOrCreate(['ma_doc_gia' => $request->ma_doc_gia], $data);


        return response()->json($msg);
    }
    public function destroy($id)
    {
        $phieu = DocGia::find($id);
        $phieu->delete();
        return response()->json(['message' => 'Xoá thành công']);
    }
}

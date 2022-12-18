<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Sach;
use App\Models\DocGia;
use App\Models\PhieuMuonTra;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;

class PhieuMuonTraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sachs = Sach::all();
        $doc_gias = DocGia::all();
        return view('phieu-muon-tra', compact('sachs', 'doc_gias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $exist = PhieuMuonTra::where('ma_phieu', $request->ma_phieu)->first();
        if (isset($exist)) {
            $msg = ['message' => 'Cập nhật Phiếu mượn trả thành công'];
        } else {
            $msg = ['message' => 'Tạo Phiếu mượn trả thành công'];
        }
        $phieu_data = [
            'ma_sach' => $request->ma_sach,
            'ma_doc_gia' => $request->ma_doc_gia,
            'tien_phat_ky_nay' => $request->tien_phat_ky_nay,
            'create_by' => 1,
            'update_by' => 1
        ];
        if($request->trang_thai == 0 ||$request->trang_thai == 2 ) {
            $phieu_data['ngay_tra'] = Carbon::now();
        }else {
            $phieu_data['ngay_muon']= Carbon::now();
        }


        $sach =  PhieuMuonTra::updateOrCreate(['ma_phieu' => $request->ma_phieu], $phieu_data);

        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getAll()
    {
        $book = DB::table('phieu_muon_tras as P')
            ->join('doc_gias as D', 'D.ma_doc_gia', '=', 'P.ma_doc_gia')
            ->join('saches as S', 'S.ma_sach', '=', 'P.ma_sach')
            ->join('tai_khoans as T', 'T.ma_tai_khoan', '=', 'P.create_by')
            ->join('tai_khoans as T2', 'T2.ma_tai_khoan', '=', 'P.create_by')
            ->select(['P.*','S.ten_sach', 'T.ten_tai_khoan as nguoi_tao', 'T2.ten_tai_khoan as nguoi_cap_nhat', 'D.ten_doc_gia'])
            ->get();


        return DataTables::of($book)->make(true);
    }
}

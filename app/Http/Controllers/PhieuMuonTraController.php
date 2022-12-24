<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Sach;
use App\Models\DocGia;
use App\Models\PhieuMuonTra;
use App\Models\Setting;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;

class PhieuMuonTraController extends Controller
{
    private $setting;
    public function __construct()
    {
        $this->setting = Setting::getSetting();
    }
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

        $validator = Validator::make($request->all(), [
            'ma_doc_gia' => 'required',
            'ma_trang_thai' => 'required',

        ]);
        if (count($validator->errors()) > 0) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        //QĐ 6: Mỗi độc giả mượn tối đa 5 quyển sách trong 4 ngày.
        $so_sach_muon_toi_da = $this->setting["so_sach_muon_toi_da"];
        $so_ngay_muon_toi_da = $this->setting["so_ngay_muon_toi_da"];
        $so_thang_han_the = $this->setting["gia_han_the"];

        if ($request->ma_trang_thai == 2) {
            //QĐ4: Chỉ cho mƣợn với thẻ còn hạn và sách không có người đang muợn.
            $doc_gia = DocGia::where('ma_doc_gia', $request->ma_doc_gia)->first();
            $ngay_tao = Carbon::parse($doc_gia->created_at);
            $han_the = $ngay_tao->diffInMonths(Carbon::now());
            if($han_the > $so_thang_han_the) {
                return response()->json(['message' => "Thẻ của bạn phải được tạo trong vòng {$so_thang_han_the} tháng"], 400);
            }
            var_dump($doc_gia);
            exit();
            $ngay_muon = Carbon::now();
            $ngay_muon_toi_da = $ngay_muon->subDays($so_ngay_muon_toi_da);
            $so_luong_sach_da_muon = PhieuMuonTra::where('ma_doc_gia', $request->ma_doc_gia)
            ->where('ma_trang_thai', 2)
            ->whereDate('ngay_muon', '>=', $ngay_muon_toi_da->format('Y-m-d') )
            ->count();

            if ($so_luong_sach_da_muon >= $so_sach_muon_toi_da) {
                return response()->json(['message' => "Bạn đọc này chỉ được mượn {$so_sach_muon_toi_da} cuốn sách trong {$so_ngay_muon_toi_da} ngày"], 400);
            }


        }





        $exist = PhieuMuonTra::where('ma_phieu', $request->ma_phieu)->first();

        if (isset($exist)) {
            $msg = ['message' => 'Cập nhật Phiếu mượn trả thành công'];
        } else {
            $msg = ['message' => 'Tạo Phiếu mượn trả thành công'];
        }
        $phieu_data = [
            'ma_sach' => $request->ma_sach,
            'ma_doc_gia' => $request->ma_doc_gia,
            'ma_trang_thai' => $request->ma_trang_thai,
            'tien_phat_ky_nay' => $request->tien_phat_ky_nay,
            'create_by' => 1,
            'update_by' => 1
        ];
        if ($request->trang_thai == 1 || $request->trang_thai == 3) {
            $phieu_data['ngay_tra'] = Carbon::now();
        } else {
            $phieu_data['ngay_muon'] = Carbon::now();
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
        $phieu = PhieuMuonTra::find($id);
        $phieu->delete();
        return response()->json(['message' => 'Xoá thành công']);
    }
    public function getAll()
    {
        $book = DB::table('phieu_muon_tras as P')
            ->whereNull('P.deleted_at')
            ->join('doc_gias as D', 'D.ma_doc_gia', '=', 'P.ma_doc_gia')
            ->join('saches as S', 'S.ma_sach', '=', 'P.ma_sach')
            ->join('tai_khoans as T', 'T.ma_tai_khoan', '=', 'P.create_by')
            ->join('tai_khoans as T2', 'T2.ma_tai_khoan', '=', 'P.create_by')
            ->select(['P.*', 'S.ten_sach', 'T.ten_tai_khoan as nguoi_tao', 'T2.ten_tai_khoan as nguoi_cap_nhat', 'D.ten_doc_gia'])
            ->get();


        return DataTables::of($book)->make(true);
    }
}

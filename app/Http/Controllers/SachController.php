<?php

namespace App\Http\Controllers;

use App\Models\LoaiSach;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\Setting;
use App\Models\TacGia;
use App\Models\TrangThaiSach;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SachController extends Controller
{
    private $setting;
    public function __construct()
    {
        $this->setting = Setting::getSetting();
    }
    public function getAll()
    {
        $book = DB::table('saches as S')->whereNull('S.deleted_at')
            ->join('tac_gias as T', 'T.ma_tac_gia', '=', 'S.ma_tac_gia')
            ->leftJoin('trang_thai_saches as TT', 'TT.ma_trang_thai', '=', 'S.ma_trang_thai')
            ->leftJoin('nha_xuat_bans as N', 'N.ma_nxb', '=', 'S.ma_nxb')
            ->leftJoin('loai_saches as LS', 'LS.ma_loai', '=', 'S.ma_loai')
            ->select([
                'S.*', 'T.ten_tac_gia', 'T.ma_tac_gia', 'TT.ten_trang_thai',
                'TT.ma_trang_thai', 'N.ten_nxb', 'N.ma_nxb', 'LS.ma_loai', 'LS.ten_loai_sach'
            ])
            ->orderByDesc('S.ma_sach')
            ->get();

        return DataTables::of($book)->make(true);
    }
    public function index()
    {
        $tac_gia = TacGia::all();
        $trang_thai = TrangThaiSach::all();
        $nxb = NhaXuatBan::all();
        $loai_sach = LoaiSach::all();
        return view(
            'books',
            [
                'loai_sach' => $loai_sach,
                'tac_gia' => $tac_gia,
                'trang_thai' => $trang_thai,
                'nxb' => $nxb
            ]
        );
    }
    public function store(Request $request)
    {

        // QĐ2: Có 3 thể loại (A, B, C). Chỉ nhận các sách trong vòng 8 năm.
        $validator = Validator::make($request->all(), [
            'ten_sach' => 'required',
            'ma_tac_gia' => 'required',
            'ma_trang_thai' => 'required',
            'ma_loai' => 'required',
            'gia_tri' => 'required',
            'ma_nxb' => 'required',
            'nam_xuat_ban' => 'required'
        ]);
        if (count($validator->errors()) > 0) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        //nhận sách trong vòng 8 năm
        $nam_xuat_ban_toi_da = $this->setting['nam_xuat_ban'];
        $nam_xuat_ban = Carbon::parse($request->nam_xuat_ban);
        $tuoi = $nam_xuat_ban->diffInYears(Carbon::now());

        if ($tuoi > $nam_xuat_ban_toi_da) {
            return response()->json(['message' => "Chỉ nhận sách tròng vòng {$nam_xuat_ban_toi_da } năm"], 400);
        }
        $user = Auth::user();
        $exist = Sach::where('ma_sach', $request->ma_sach)->first();
        if (isset($exist)) {
            $msg = ['message' => 'Cập nhật sách thành công'];
        } else {
            $msg = ['message' => 'Thêm sách thành công'];
        }
        $sach =  Sach::updateOrCreate(['ma_sach' => $request->ma_sach], [
            'ten_sach' => $request->ten_sach,
            'ma_tac_gia' => $request->ma_tac_gia,
            'ma_trang_thai' => $request->ma_trang_thai,
            'ma_nxb' => $request->ma_nxb,
            'nam_xuat_ban' => $request->nam_xuat_ban,
            'ma_loai' => $request->ma_loai,
            'gia_tri' => $request->gia_tri,
            'ma_nhan_vien' => "1",
            'create_by' => $user->ma_tai_khoan,
            'update_by' => $user->ma_tai_khoan,
        ]);


        return response()->json($msg);
    }
    public function destroy($id)
    {
        Sach::find($id)->delete();
        return response()->json(['message' => 'Xoá thành công']);
    }
}

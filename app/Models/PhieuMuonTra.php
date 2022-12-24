<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuMuonTra extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'phieu_muon_tras';
    protected $primaryKey = 'ma_phieu';
    protected $fillable = ['ma_phieu', 'ma_doc_gia', 'ngay_muon', 'ngay_tra', 'tien_phat_ky_nay', 'create_by', 'update_by', 'ma_trang_thai', 'ma_sach'];
}

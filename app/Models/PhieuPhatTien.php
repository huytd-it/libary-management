<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuPhatTien extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'phieu_phat_tiens';
    protected $primaryKey = 'ma_phat_tien';
    protected $fillable = ['ma_phat_tien', 'ma_doc_gia', 'ma_nhan_vien', 'ma_sach', 'so_tien_thu', 'create_by', 'update_by'];
}

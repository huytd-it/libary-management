<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sach extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'saches';
    protected $primaryKey = 'ma_sach';
    protected $fillable = ['ma_sach', 'ten_sach', 'ma_tac_gia', 'ma_trang_thai', 'ma_nxb', 'ma_loai', 'gia_tri', 'ma_nhan_vien', 'create_by', 'update_by', 'nam_xuat_ban'];
}

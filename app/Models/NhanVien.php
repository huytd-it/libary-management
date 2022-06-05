<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'nhan_viens';
    protected $primaryKey = 'ma_nhan_vien';
    protected $fillable = ['ma_nhan_vien', 'ten_nhan_vien', 'ma_chuc_vu', 'ma_bang_cap', 'ten_tai_khoan', 'create_by', 'update_by'];
}

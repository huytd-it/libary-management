<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaiKhoan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tai_khoans';
    protected $primaryKey = 'ma_tai_khoan';
    protected $fillable = ['ma_tai_khoan', 'ten_tai_khoan', 'mat_khau', 'create_by', 'update_by'];

}

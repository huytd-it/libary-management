<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhongBan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'phong_bans';
    protected $primaryKey = 'ma_phong_ban';
    protected $fillable = ['ma_phong_ban', 'ten_phong_ban', 'ma_nhan_vien', 'create_by', 'update_by'];
}

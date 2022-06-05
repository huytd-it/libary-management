<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiSach extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'loai_saches';
    protected $primaryKey = 'ma_loai_sach';
    protected $fillable = ['ma_loai_sach', 'ten_loai_sach', 'create_by', 'update_by'];
}

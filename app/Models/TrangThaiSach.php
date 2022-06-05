<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrangThaiSach extends Model
{

    use HasFactory, SoftDeletes;
    protected $table = 'trang_thai_saches';
    protected $primaryKey = 'ma_trang_thai';
    protected $fillable = ['ma_trang_thai', 'ten_trang_thai', 'create_by', 'update_by'];

}

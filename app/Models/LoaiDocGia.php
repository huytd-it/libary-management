<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiDocGia extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'loai_doc_gias';
    protected $primaryKey = 'ma_loai';
    protected $fillable = ['ma_loai', 'ten_loai', 'create_by', 'update_by'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocGia extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'doc_gias';
    protected $primaryKey = 'ma_doc_gia';
    protected $fillable = [ 'ten_doc_gia', 'ngay_sinh', 'dia_chi', 'email', 'ma_loai', 'create_by', 'update_by', 'created_at'];
}

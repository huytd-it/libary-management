<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuThanhLy extends Model
{

    use HasFactory, SoftDeletes;
    protected $table = 'phieu_thanh_lies';
    protected $primaryKey = 'ma_thanh_li';
    protected $fillable = ['ma_thanh_li', 'ngay_thanh_li', 'ma_doc_gia', 'create_by', 'update_by'];
}

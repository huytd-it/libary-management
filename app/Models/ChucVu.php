<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucVu extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'chuc_vus';
    protected $primaryKey = 'ma_chuc_vu';
    protected $fillable = ['ma_chuc_vu', 'ten_chuc_vu', 'create_by', 'update_by'];

}

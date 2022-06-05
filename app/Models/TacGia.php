<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TacGia extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tac_gias';
    protected $primaryKey = 'ma_tac_gia';
    protected $fillable = ['ma_tac_gia', 'ten_tac_gia', 'gioi_thieu', 'create_by', 'update_by'];
}

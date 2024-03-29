<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhaXuatBan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'nha_xuat_bans';
    protected $primaryKey = 'ma_nxb';
    protected $fillable = ['ma_nxb', 'ten_nxb', 'create_by', 'update_by'];
}

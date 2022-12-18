<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table = 'tai_khoans';
    protected $primaryKey = 'ma_tai_khoan';
    protected $fillable = ['ma_tai_khoan', 'ten_tai_khoan', 'mat_khau', 'create_by', 'update_by'];
    protected $hidden = [
        'mat_khau'

    ];
    function getAuthPassword()
    {
        return $this->mat_khau;
    }
    public function getPasswordAttribute()
    {
        return $this->mat_khau;
    }
}

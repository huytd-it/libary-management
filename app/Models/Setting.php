<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $primaryKey = 'ma_cai_dat';
    protected $fillable = ['ten_thay_the', 'ten', 'gia_tri'];

    public static function getSetting()
    {
        $arr = [];

        foreach (Setting::all() as $item) {
            $arr[$item->ten_thay_the] = $item->gia_tri;
        }
        return $arr;
    }

}

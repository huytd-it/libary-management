<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BangCap extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bang_caps';
    protected $primaryKey = 'ma_bang_cap';
    protected $fillable = ['ma_bang_cap', 'ten_bang_cap', 'create_by', 'update_by'];
}

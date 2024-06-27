<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaidc extends Model
{
    protected $table = 'loaidochoi';

    protected $primaryKey = 'MaLoai';

    // Các trường có thể được gán hoặc truy vấn thông qua model này
    protected $fillable = ['MaLoai','TenLoai'];

    // Không sử dụng timestamps Laravel
    public $timestamps = false;
}

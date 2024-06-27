<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dochoicongnghe extends Model
{
    protected $table = 'dochoicongnghe';

    protected $primaryKey = 'MaDC';

    // Các trường có thể được gán hoặc truy vấn thông qua model này
    protected $fillable = ['MaDC',
    'TenDC',
    'MaLoai',
    'SoLuong',
    'GiaBan',
    'Anh'];

    // Không sử dụng timestamps Laravel
    public $timestamps = false;
}

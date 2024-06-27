<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    protected $table = 'hoadon';

    protected $primaryKey = 'MaHoaDon';

    // Các trường có thể được gán hoặc truy vấn thông qua model này
    protected $fillable = ['MaHoaDon', 'IDTaiKhoan', 'NgayBan', 'TongHoaDon','TrangThai'];

    // Không sử dụng timestamps Laravel
    public $timestamps = false;
}

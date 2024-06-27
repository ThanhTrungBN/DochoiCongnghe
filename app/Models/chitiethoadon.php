<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadon';

    protected $primaryKey = 'MaCTHD';

    // Các trường có thể được gán hoặc truy vấn thông qua model này
    protected $fillable = ['MaCTHD', 'MaHoaDon', 'MaDC', 'SoLuong', 'Gia', 'MaKhachHang'];

    // Không sử dụng timestamps Laravel
    public $timestamps = false;
}

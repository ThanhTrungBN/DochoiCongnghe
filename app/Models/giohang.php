<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    protected $table = 'giohang';

    protected $primaryKey = 'MaGioHang';

    // Các trường có thể được gán hoặc truy vấn thông qua model này
    protected $fillable = ['MaGioHang', 'IDTaiKhoan', 'MaDC', 'SoLuong','Gia'];

    // Không sử dụng timestamps Laravel
    public $timestamps = false;
    public function taikhoan() {
        return $this->belongsTo(taikhoan::class, 'IDTaiKhoan', 'IDTaiKhoan');
    }   
}

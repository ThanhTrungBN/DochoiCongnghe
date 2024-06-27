<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $table = 'KhachHang';

    protected $primaryKey = 'MaKhachHang';

    // Các trường có thể được gán hoặc truy vấn thông qua model này
    
    protected $fillable = [
        'MaKhachHang', 'IDTaiKhoan','TenKhachHang', 'SDT', 'DiaChi'  
        
       
    ];
    // Không sử dụng timestamps Laravel
    public $timestamps = false;
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class taikhoan extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    protected $table = 'taikhoan';

    protected $primaryKey = 'IDTaiKhoan';
    protected $fillable = ['IDTaiKhoan', 'TaiKhoan','MatKhau'];

    public $timestamps = false;
    public function giohang()
{
    return $this->hasOne(giohang::class, 'IDTaiKhoan', 'IDTaiKhoan');
}
}

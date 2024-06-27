<?php

namespace App\Http\Controllers;

use App\Models\loaidc;
use App\Models\dochoicongnghe;
use App\Models\giohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class chitietcontroller extends Controller
{
    function chitiet($id)
    {
        $dochoi = dochoicongnghe::join('loaidochoi', 'dochoicongnghe.MaLoai', '=', 'loaidochoi.MaLoai')
        ->select(
            'dochoicongnghe.MaDC', 
            'dochoicongnghe.TenDC', 
            'dochoicongnghe.MaLoai', 
            'dochoicongnghe.SoLuong', 
            'dochoicongnghe.GiaBan', 
            'dochoicongnghe.Anh',
        )
        ->where('dochoicongnghe.MaDC', $id)
        ->get();
        $chitiet = DB::table('dochoicongnghe')->where('MaDC', $id)->first();

        return view('chitiet', ['chitiet' => $chitiet], ['dochoi' => $dochoi]);
    }
    function themvaogiohang($id,Request $request)
    {
        $chitiet = DB::table('dochoicongnghe')->where('MaDC', $id)->first();
        $user = Session::get('user');
       

        if ($user) {
            $giohang = giohang::where('MaDC', $id)->where('IDTaiKhoan', $user->IDTaiKhoan)->first();

            if ($giohang) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, chỉ cập nhật số lượng
                $giohang->SoLuong += $request->SoLuong;
                $giohang->save();
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
                $addgiohang = new giohang();
                $addgiohang->MaDC = $id;
                $addgiohang->SoLuong = $request->SoLuong;
               
                $addgiohang->Gia = $chitiet->GiaBan;
                $addgiohang->IDTaiKhoan = $user->IDTaiKhoan;
                $addgiohang->save();
            }
            // Lấy thông tin giỏ hàng sau khi thêm sản phẩm
            // $thongTinSanPham = DB::table('giohang')
            //     ->join('DoChoiCongNghe', 'giohang.MaDC', '=', 'DoChoiCongNghe.MaDC')
            //     ->select('DoChoiCongNghe.MaDC','DoChoiCongNghe.TenDC', 'DoChoiCongNghe.Anh', 'giohang.SoLuong', 'giohang.Gia')
            //     ->where('giohang.IDTaiKhoan', '=', $user->IDTaiKhoan)
            //     ->get();
            // $thongtingiohang = DB::table('giohang')
            //     ->join('DoChoiCongNghe', 'giohang.MaDC', '=', 'DoChoiCongNghe.MaDC')
            //     ->select('DoChoiCongNghe.MaDC', 'DoChoiCongNghe.Anh', 'giohang.SoLuong', 'giohang.Gia')
            //     ->where('giohang.IDTaiKhoan', '=', $user->IDTaiKhoan)
            //     ->get();
                
            // Session::put('giohang', $thongtingiohang);
            // Hiển thị trang giỏ hàng
            // return view('giohang', ['giohang' => $thongTinSanPham]);
            return redirect()->route('main');
        }
    }
}

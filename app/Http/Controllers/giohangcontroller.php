<?php

namespace App\Http\Controllers;

use App\Models\chitiethoadon;
use App\Models\giohang;
use App\Models\hoadon;
use App\Models\khachhang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class giohangcontroller extends Controller
{
    public function giohang()
    {
    $user = Session::get('user');
        $cart = DB::table('giohang')
            ->join('DoChoiCongNghe', 'giohang.MaDC', '=', 'DoChoiCongNghe.MaDC')
            ->select('giohang.SoLuong', 'giohang.Gia')
            ->where('giohang.IDTaiKhoan', '=', $user->IDTaiKhoan)
            ->get();
        $Tongtien = 0;
        foreach ($cart as $productId) {
            $Tongtien += $productId->SoLuong * $productId->Gia;
        }
        $thongTinSanPham = DB::table('giohang')
        ->join('DoChoiCongNghe', 'giohang.MaDC', '=', 'DoChoiCongNghe.MaDC')
        ->join('LoaiDoChoi', 'DoChoiCongNghe.MaLoai', '=', 'LoaiDoChoi.MaLoai')
        ->select(
            'DoChoiCongNghe.MaDC',
            'DoChoiCongNghe.TenDC',
            'DoChoiCongNghe.Anh',
            'giohang.SoLuong',
            'giohang.Gia',
            'LoaiDoChoi.TenLoai'
        )
        ->where('giohang.IDTaiKhoan', '=', $user->IDTaiKhoan)
        ->get();

        return view('giohang', compact('user'), ['giohang' => $thongTinSanPham, 'tongtien' => $Tongtien]);
    }
    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',

            // Thêm các quy tắc kiểm tra khác tùy theo yêu cầu
        ]);
        // Tạo một đơn hàng mới và lưu vào cơ sở dữ liệu
        $user = Session::get('user');
        $order = new khachhang();
        $order->IDTaiKhoan = $user->IDTaiKhoan;
        $order->TenKhachHang = $request->input('name');
        $order->SDT = $request->input('phone');
        $order->DiaChi = $request->input('address');
        // Thêm các trường khác của đơn hàng nếu cần


        $order->save();

        // Lưu thông tin về sản phẩm 
        // $cart = session('giohang');


        $cart = DB::table('giohang')
            ->join('DoChoiCongNghe', 'giohang.MaDC', '=', 'DoChoiCongNghe.MaDC')
            ->select('DoChoiCongNghe.MaDC', 'DoChoiCongNghe.Anh', 'giohang.SoLuong', 'giohang.Gia')
            ->where('giohang.IDTaiKhoan', '=', $user->IDTaiKhoan)
            ->get();
        $Tongtien = 0;

        foreach ($cart as $productId) {
            $Tongtien += $productId->SoLuong * $productId->Gia;
        }


        $hoadon = new hoadon();
        $hoadon->IDTaiKhoan = $user->IDTaiKhoan;
        $hoadon->TongHoaDon = $Tongtien;
        $hoadon->TrangThai="Chờ Xác Nhận";
        $hoadon->save();
        $Tongtien = 0;

        foreach ($cart as $productId) {
            $orderDetail = new chitiethoadon();
            $orderDetail->MaHoaDon = $hoadon->MaHoaDon;
            $orderDetail->Makhachhang = $order->MaKhachHang;
            $orderDetail->MaDC = $productId->MaDC;
            $orderDetail->Soluong = $productId->SoLuong;
            $orderDetail->Gia = $productId->Gia;
            $orderDetail->save();
        }

        $user = Session::get('user');
        $item = GioHang::where('IDTaiKhoan', $user->IDTaiKhoan);
        $item->delete();
        return redirect()->route('giohang');
    }
    public function destroy($id)
    {
        $user = Session::get('user');
        $item = GioHang::where('MaDC', $id)
            ->where('IDTaiKhoan', $user->IDTaiKhoan)
            ->first();
        $item->delete();
        return redirect()->route('giohang');
    }
    public function sanphamdamua(){
        $user = Session::get('user');
        $data = DB::table('HoaDon')
            ->join('ChiTietHoaDon', 'HoaDon.MaHoaDon', '=', 'ChiTietHoaDon.MaHoaDon')
            ->join('KhachHang', 'ChiTietHoaDon.MaKhachHang', '=', 'KhachHang.MaKhachHang')
            ->join('DoChoiCongNghe', 'ChiTietHoaDon.MaDC', '=', 'DoChoiCongNghe.MaDC')
            ->select(
                'HoaDon.MaHoaDon',
                'HoaDon.NgayBan',
                'HoaDon.TrangThai',
                'ChiTietHoaDon.SoLuong',
                'ChiTietHoaDon.Gia',
                'KhachHang.TenKhachHang',
                'DoChoiCongNghe.TenDC',
                'HoaDon.TongHoaDon'
            )
            ->where('HoaDon.IDTaiKhoan','=', $user->IDTaiKhoan)
            ->get()
            ->groupBy('MaHoaDon');

        return view('sanphamdamua', ['hoadon' => $data]);
    }
}

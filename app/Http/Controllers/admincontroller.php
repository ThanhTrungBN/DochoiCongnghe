<?php

namespace App\Http\Controllers;

use App\Models\dochoicongnghe;
use App\Models\hoadon;
use App\Models\loaidc;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;
use Illuminate\Http\UploadedFile;

use function Laravel\Prompts\select;

class admincontroller extends Controller
{
    function admin(Request $request)
    {

        return view('admin');
    }
    function create()
    {
        $loaidochoi = loaidc::all();
        return view('add', ['loaidochoi' => $loaidochoi]);
    }
    function select()
    {
        $dochoi = dochoicongnghe::leftJoin('loaidochoi', 'dochoicongnghe.MaLoai', '=', 'loaidochoi.MaLoai')
            ->select('dochoicongnghe.MaDC', 'dochoicongnghe.TenDC', 'dochoicongnghe.MaLoai', 'dochoicongnghe.SoLuong', 'dochoicongnghe.GiaBan', 'dochoicongnghe.Anh', 'loaidochoi.TenLoai')
            ->orWhereNotNull('loaidochoi.TenLoai') 
            ->orWhereNull('dochoicongnghe.MaLoai') 
            ->get();
        return view('select', ['dochoi' => $dochoi]);
    }
    function add(Request $request)
    {
        $addsp = new dochoicongnghe; // Chỉnh sửa tên lớp nếu cần
        $addsp->TenDC = $request->input('productName');
        $addsp->MaLoai = $request->input('category');
        $addsp->SoLuong = $request->input('quantity');
        $addsp->GiaBan = $request->input('price');
        $addsp->MoTa = $request->input('describe');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/admin', $filename);
            $addsp->Anh = $filename;
        }

        $addsp->save();

        $dochoi = dochoicongnghe::leftJoin('loaidochoi', 'dochoicongnghe.MaLoai', '=', 'loaidochoi.MaLoai')
            ->select('dochoicongnghe.MaDC', 'dochoicongnghe.TenDC', 'dochoicongnghe.MaLoai', 'dochoicongnghe.SoLuong', 'dochoicongnghe.GiaBan', 'dochoicongnghe.Anh', 'loaidochoi.TenLoai')
            ->orWhereNotNull('loaidochoi.TenLoai') // Bổ sung điều kiện mới: nếu TenLoai không null
            ->orWhereNull('dochoicongnghe.MaLoai') // Nếu không có MaLoai
            ->get();

        return view('select', ['dochoi' => $dochoi]);
    }

    public function update($id)
    {
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $product_DC = DB::table('dochoicongnghe')->where('MaDC', $id)->first();
        $loaidochoi = loaidc::all();

        // Kiểm tra nếu không có sản phẩm được tìm thấy

        // Trả về view sửa sản phẩm với dữ liệu sản phẩm
        return view('update', ['product_DC' => $product_DC], ['loaidochoi' => $loaidochoi]);
    }

    public function  destroy($id)
    {
        $category = dochoicongnghe::findOrFail($id);
        $category->delete();
        return redirect()->route('select');
    }
    function themloai()
    {
        $loaidc = DB::table('loaidochoi')->get();
        return view('loaidc', ['loaidc' => $loaidc]);
    }
    public function  destroyloai($id)
    {
        $loaidc = loaidc::findOrFail($id);
        $loaidc->delete();
        $loaidc = DB::table('loaidochoi')->get();
        return view('loaidc', ['loaidc' => $loaidc]);
    }
    function addLoai(Request $request)
    {
        $addloai = new loaidc();
        $addloai->TenLoai = $request->input('loaidochoi');
        $addloai->save();
        // return redirect()->back()->with('status', 'Thêm sản phẩm thành công');
        $loaidc = DB::table('loaidochoi')->get();
        return view('loaidc', ['loaidc' => $loaidc]);
    }



    function sualoai($id)
    {
        $loaidc = DB::table('loaidochoi')->where('MaLoai', $id)->first();
        return view('updateLoaiDC', ['loaidc' => $loaidc]);
    }
    /////sualoaidc//
    public function updateLoaiDC(Request $request, $id)
    {
        $loaidc = Loaidc::findOrFail($id);
        $tendc = $request->input('loaidochoi');
        $loaidc->TenLoai = $tendc;
        $loaidc->save();

        $dochoi = dochoicongnghe::join('loaidochoi', 'dochoicongnghe.MaLoai', '=', 'loaidochoi.MaLoai')
            ->select('dochoicongnghe.MaDC', 'dochoicongnghe.TenDC', 'dochoicongnghe.MaLoai', 'dochoicongnghe.SoLuong', 'dochoicongnghe.GiaBan', 'dochoicongnghe.Anh', 'loaidochoi.TenLoai')
            ->get();
        return view('select', ['dochoi' => $dochoi]);
    }
    /////Hoadon////
    public function hoadon()
    {
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

            ->get()
            
            ->groupBy('MaHoaDon');
        return view('hoadon', ['hoadon' => $data]);
    }
    ////
    function trangthai(Request $request,$id)
    {
        $trangthai = hoadon::findOrFail($id);
        $trangthai->TrangThai =$request->input('trangthai');
        $trangthai->save();
        return redirect()->route('hoadon');
    }
}

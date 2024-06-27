<?php

namespace App\Http\Controllers;

use App\Models\dochoicongnghe;
use App\Models\loaidc;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class trangchucontroller extends Controller
{
 
    function main(Request $request) {
        $data = $request->query('data');
        $flycam = dochoicongnghe::join('loaidochoi', 'dochoicongnghe.MaLoai', '=', 'loaidochoi.MaLoai')
        ->where('loaidochoi.TenLoai', 'Robot Công nghệ')
        ->select('dochoicongnghe.MaDC', 'dochoicongnghe.TenDC', 'dochoicongnghe.MaLoai', 'dochoicongnghe.SoLuong', 'dochoicongnghe.GiaBan', 'dochoicongnghe.Anh', 'loaidochoi.TenLoai')
        ->get();
        $kinh = dochoicongnghe::join('loaidochoi', 'dochoicongnghe.MaLoai', '=', 'loaidochoi.MaLoai')
        ->where('loaidochoi.TenLoai', 'Đồng hồ thông minh')
        ->select('dochoicongnghe.MaDC', 'dochoicongnghe.TenDC', 'dochoicongnghe.MaLoai', 'dochoicongnghe.SoLuong', 'dochoicongnghe.GiaBan', 'dochoicongnghe.Anh', 'loaidochoi.TenLoai')
        ->get();
        $dochoi = DB::table('dochoicongnghe')->take(10  )->get();
        return view('mainnew',['dochoi'=>$dochoi,'flycam'=>$flycam,'data'=>$data,'kinh'=>$kinh]);
    }

}

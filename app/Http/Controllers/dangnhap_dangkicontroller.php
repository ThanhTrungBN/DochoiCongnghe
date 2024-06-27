<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\dochoicongnghe;
use App\Models\giohang;
use App\Models\taikhoan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dangnhap_dangkicontroller extends Controller
{
    function hienthidangki(){
        return view('dangki');
    }
    function hienthidangnhap(){
        return view('dangnhap');
    }
function dangki(Request $request){
    $taikhoancu = taikhoan::all();

    $userInput = intval($request->input('user'));

foreach ($taikhoancu as $user) {
    // So sánh tài khoản với giá trị đã chuyển đổi sang kiểu số
    if($user->TaiKhoan === $request->input('user')) {
        return 'Tên tài khoản đã tồn tại';
    }
}

    if($request->input('pass')===$request->input('pass-repeat')){
    $taikhoan= new taikhoan();
    $taikhoan->TaiKhoan = $request->input('user');
    $taikhoan->MatKhau = $request->input('pass');
    $taikhoan->save();
    return view('dangnhap');
    }
    else {
        echo "Điều kiện không thỏa mãn.";
    }
}

public function dangnhap(Request $request){
    $userInput = $request->input('user');
    // Tìm tài khoản trong cơ sở dữ liệu
    $user = taikhoan::where('TaiKhoan', $userInput)->first();
    if($user&&$userInput==='admin'){
        return redirect()->route('admin');
    }
    if($user) {
        Auth::login($user);
        Session::put('user', Auth::user());
        return redirect()->route('main', ['data' => $user->IDTaiKhoan]);
    } else {
        return back()->withErrors([
            'message' => 'Tài khoản không tồn tại. Vui lòng thử lại.',
        ]);
    }
}
}
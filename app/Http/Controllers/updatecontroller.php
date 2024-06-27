<?php

namespace App\Http\Controllers;

use App\Models\dochoicongnghe;
use App\Models\loaidc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class updatecontroller extends Controller
{
    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $dochoicongnghe = dochoicongnghe::findOrFail($id);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        if ($request->hasFile('Anh')) {
            // Lấy file ảnh từ request
            $file = $request->file('Anh');
            $extension = $file->getClientOriginalExtension(); 
            $fileName = time().'.'.$extension;
            // Di chuyển file vào thư mục uploads/admin
            $file->move('uploads/admin', $fileName); 
    
            // Cập nhật đường dẫn ảnh mới vào mảng dữ liệu
            $data['Anh'] = $fileName;
    
            // Xóa file ảnh cũ nếu có
            if (file_exists(public_path($dochoicongnghe->Anh))) {
                unlink(public_path($dochoicongnghe->Anh));
            }
        }
        $dochoicongnghe->MaLoai = $request->input('MaLoai');
      
        $dochoicongnghe->update($data);
        $dochoi = dochoicongnghe::leftJoin('loaidochoi', 'dochoicongnghe.MaLoai', '=', 'loaidochoi.MaLoai')
            ->select('dochoicongnghe.MaDC', 'dochoicongnghe.TenDC', 'dochoicongnghe.MaLoai', 'dochoicongnghe.SoLuong', 'dochoicongnghe.GiaBan', 'dochoicongnghe.Anh', 'loaidochoi.TenLoai')
            ->orWhereNotNull('loaidochoi.TenLoai') // Bổ sung điều kiện mới: nếu TenLoai không null
            ->orWhereNull('dochoicongnghe.MaLoai') // Nếu không có MaLoai
            ->get();

        return view('select', ['dochoi' => $dochoi]);
    }
    
}

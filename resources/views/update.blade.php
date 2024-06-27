@extends('admin')
@section('content')
<form method="POST" action="/admin/dochoicongnghe/edit/{{$product_DC->MaDC}}" enctype="multipart/form-data">
  @csrf
  <table class="select_table">
    <thead>
      <tr>     
        <th>Ảnh sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Mệnh giá</th>
        <th>Số lượng</th>
        <th>Mã loại</th>
        <th colspan="2">Tác vụ</th>
      </tr>
    </thead>
    <tbody class="update">
      <tr>
        
        <td><input type="file" name="Anh" request><img src="{{asset('uploads/admin/'.$product_DC ->Anh) }}" width="100px" height="70px" alt="Ảnh hiện tại"></td>
        <td><input type="text" name="TenDC" value="{{$product_DC->TenDC}}" request></td>
        <td><input type="text" name="GiaBan" value="{{$product_DC->GiaBan}}" request></td>
        <td><input type="text" name="SoLuong" value="{{$product_DC->SoLuong}}" request></td>
        <td><select name="MaLoai" id="" style="width: calc(100% - 2px);padding: 8px;border: 1px solid #ccc;border-radius: 5px;">
                <option value="" style="display:none;"></option>
                @foreach ($loaidochoi as $row )
                <option value="{{$row->MaLoai}}" id="category" required>{{$row->TenLoai}}:{{$row->MaLoai}}</option>
                @endforeach
            </select>
          </td>
        
        <td><button type="submit">Save</button></td>
      </tr>
    </tbody>

  </table>
</form>
@endsection
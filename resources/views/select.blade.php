@extends('admin')
@section('content')
 
<table class="select_table">
  <thead>
    <tr>
      <th>Ảnh sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Tên loại sản phẩm</th>
      <th>Mệnh giá</th>
      <th>Số lượng</th>
      <th colspan="2">Tác vụ</th>
    </tr>
  </thead>
  <tbody class="update">
    @foreach ($dochoi as $row )
    <tr>
      <td><img src="{{asset('uploads/admin/'.$row->Anh)}}" width="100px" height="90px"  alt="Anh dai dien"> </td>
      <td>{{$row->TenDC}}</td>
      <td>{{$row->TenLoai}}</td>
      <td>{{number_format($row->GiaBan, 0, ',', '.')}}</td>
      <td>{{$row->SoLuong}}</td>
      <td class="actions">
        <button><a href="{{ route('update', ['id' => $row->MaDC]) }}">Sửa</a></button>
        <button><a href="{{ route('dochoicongnghe.delete', ['id' => $row->MaDC]) }}">xóa</a></button>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>

@endsection
@extends('admin')
@section('content')

<table class="select_table">
  
  <tbody class="update">
  <table>
    @foreach ($hoadon as $MaHoaDon => $rows)
    <form method="POST" action="/suatrangthai/{{$rows[0]->MaHoaDon}}" enctype="multipart/form-data">
    @csrf
        <tr>
            <td colspan="1"><strong>Chi tiết hóa đơn:  </strong><strong>{{$rows[0]->MaHoaDon}}</strong></td>
            <td><strong>Trạng Thái:</strong><select name="trangthai">
                <option value="Chờ xác nhận" {{$rows[0]->TrangThai=='Chờ Xác Nhận'? 'selected':''}}> Chờ Xác Nhận</option>
                <option value="Đang Chuẩn Bị Hàng" {{$rows[0]->TrangThai=='Đang Chuẩn Bị Hàng'? 'selected':''}}> Đang Chuẩn Bị Hàng</option>
                <option value="Đang Giao Hàng" {{$rows[0]->TrangThai=='Đang Giao Hàng'? 'selected':''}}>Đang Giao Hàng</option>
                <option value="Giao Hàng Thành Công" {{$rows[0]->TrangThai=='Giao Hàng Thành Công'? 'selected':''}}>Giao Hàng Thành Công</option>
            </select></td>
            <td><button type="submit">UP</button></td>
        </tr>
    </form>
        <tr>
            <td><strong>Tên khách hàng:</strong> {{$rows[0]->TenKhachHang}}</td>
            <td><strong>Tổng hóa đơn:</strong> {{number_format($rows[0]->TongHoaDon, 0, ',', '.')}} VND</td>
            <td><strong>Ngày bán:</strong> {{$rows[0]->NgayBan}}</td>
            
        </tr>
        <tr>
            <td><strong>Tên đồ chơi</strong></td>
            <td><strong>Giá</strong></td>
            <td><strong>Số lượng</strong></td>
        </tr>
        @foreach ($rows as $row)
            <tr>
                <td>{{$row->TenDC}}</td>
                <td>{{number_format($row->Gia, 0, ',', '.')}} VND</td>
                <td>{{$row->SoLuong}}</td>
            </tr>
        @endforeach
    @endforeach
</table>

  </tbody>

</table>

@endsection




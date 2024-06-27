@extends('admin')
@section('content')
<div class="container">
    <h1>Thêm loại đồ chơi</h1>
    <form id="toy-type-form" method="POST" action="/updateLoaiDC/{{$loaidc->MaLoai}}" enctype="multipart/form-data">
    @csrf 
        <div class="form-group">
            <label for="toy-type">Tên loại đồ chơi:</label>
            <input type="text" id="toy-type" name="loaidochoi" value="{{$loaidc->TenLoai}}" required>
        </div>
        <button type="submit">Lưu sửa</button>
    </form>
</div>
@endsection
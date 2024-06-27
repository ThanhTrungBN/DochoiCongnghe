@extends('admin')
@section('content')
<div class="container">
    <h1>Thêm loại đồ chơi</h1>
    <form id="toy-type-form" action="{{route('addloai')}}" method="POST">
    @csrf 
        <div class="form-group">
            <label for="toy-type">Tên loại đồ chơi:</label>
            <input type="text" id="toy-type" name="loaidochoi" required>
        </div>
        <button type="submit">Thêm loại đồ chơi</button>
    </form>
    <div id="toy-type-list"></div>
</div>
<h1>Quản lý Loại Đồ Chơi</h1>
<table>
    <thead>
        <tr>

            <th>Tên Loại</th>
            <th>Công Cụ</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($loaidc as $row )
        <tr>
            <td>{{$row->TenLoai}}</td>
            <td>
                <button class="edit-btn"><a href="{{route('sualoai',['id' => $row->MaLoai]) }}">Sửa</a></button>
                @csrf 
                @method('delete')
                    <button class="edit-btn"><a href="{{route('loaidc.deleteloaidc', ['id' => $row->MaLoai])}}">xóa</a></button>                   
                </form>
            </td>
            <td>
                {{$row->MaLoai}}
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection
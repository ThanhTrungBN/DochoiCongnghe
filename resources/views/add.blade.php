@extends('admin')
@section('content')
<div class="container">
    @if (session('status'))
    <h5 class="alert alert-success">{{ session('status')}}</h5>
    @endif
    <h1>Thêm sản phẩm</h1>
    <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product-name">Tên đồ chơi:</label>
            <input type="text" id="product-name" name="productName" required>
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng:</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="text" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="category">Mã loại:</label>
            <!-- <input type="text" id="category" name="category" required> -->
            <select name="category" id="" style="width: calc(100% - 2px);padding: 8px;border: 1px solid #ccc;border-radius: 5px;">
                <option value="" style="display:none;"></option>
                @foreach ($loaidochoi as $row )
                <option value="{{$row->MaLoai}}" id="category" required>{{$row->TenLoai}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input onchange="imageChange()" type="file" id="image" name="image" required>
            <div>
                <img src="" id="preImage" width="100px" height="70px" style="display:none;" alt="">
            </div>
        </div>
        <div class="form-group">
            <label for="product-name">Mô tả:</label>
            <input type="text" id="product-name" name="describe" required>
        </div>
        <button type="submit">Thêm sản phẩm</button>
    </form>
    <div id="product-list"></div>
    <script>
        function imageChange() {
            var imageChange = document.getElementById('image');
            var file = imageChange.files[0];
            var read = new FileReader();
            read.onload = function() {
                var pre = document.getElementById('preImage');
                pre.src = read.result;
                pre.style.display = 'block';
            }
            if (file) {
                read.readAsDataURL(file)
            } else {
                var pre = document.getElementById('preImage');
                pre.src = '';
                pre.style.display = 'none';
            }
        }
    </script>
</div>
@endsection
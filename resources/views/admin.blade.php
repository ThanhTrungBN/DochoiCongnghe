<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/quantri.css')}}">
    <link rel="icon" href="home-icon.png" type="image/png" sizes="16x16">
</head>
<body>
   
    <div class="header">
        <div class="logo">
            <a href="http://127.0.0.1:5500/html/TRANGCHU.HTML">Trang chủ</a>
        </div>
        <div class="navbar">
            
        </div>
    </div>
    <hr>
    <div class="content-wrapper">
        <div class="menu">
            <ul id="MENU">
                <li><a>Menu</a></li>
                <li><a href="{{ route('hoadon') }}">Danh mục hóa đơn</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="button-group">
                <button><a href="{{ route('selectadd') }}">+ Thêm đồ chơi</a></button>
                <button><a href="{{ route('select') }}">+ Hiển thị danh sách sản phẩm</a></button>
                <button><a href="{{ route('loaidc') }}">+ Thêm loại đồ chơi</a></button>
            </div>
            <div id="aa">
                @yield('content')
            </div>
            <div class="gd"></div>
        </div>
    </div>
</body>
</html>
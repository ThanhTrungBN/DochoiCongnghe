<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <style>
        body {
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            display: flex;
            font-family: sans-serif;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .title {
            margin-bottom: 5vh;
        }

        .card {
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0 1vh;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 2vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('/css/giohang.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/fontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/fontend/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">


</head>

<body>
    @include('SVG')
    <header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
        <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3" style="box-shadow: 5px 5px 10px #888888;">
            <div class="container-fluid">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
                    <div class="offcanvas-body">
                        <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link me-4 active" href="{{ route('main') }}">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" href="#company-services">DỊCH VỤ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" href="#mobile-products">CÁC SẢN PHẨM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" href="#smart-watches">XEM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" href="#yearly-sale">DOANH THU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" href="#latest-blog">BLOG</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">TRANG</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="about.html" class="dropdown-item">about</a>
                                    </li>
                                    <li>
                                        <a href="blog.html" class="dropdown-item">Blog</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="dropdown-item">Shop</a>
                                    </li>
                                    <li>
                                        <a href="cart.html" class="dropdown-item">Giỏ hàng</a>
                                    </li>
                                    <li>
                                        <a href="checkout.html" class="dropdown-item">Thanh toán</a>
                                    </li>
                                    <li>
                                        <a href="single-post.html" class="dropdown-item">Bài đăng</a>
                                    </li>
                                    <li>
                                        <a href="contact.html" class="dropdown-item">Liên hệ</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <div class="user-items ps-5">
                                    <ul class="d-flex justify-content-end list-unstyled">
                                        <li class="search-item pe-3">
                                            <a href="#" class="search-button">
                                                <svg class="search">
                                                    <use xlink:href="#search"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="pe-3">
                                            <a href="#">
                                                <svg class="user">
                                                    <use xlink:href="#user"></use>
                                                </svg>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="card" style="margin-top: 90px;">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Giỏ Hàng</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted"></div>
                    </div>
                </div>

                <form action="{{route('giohang')}}" method="POST">
                    @csrf
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2" style="width:80px;height:80px"> </div>
                            <div class="col-2">
                                <div class="row text-muted">Tên đồ chơi</div>
                                
                            </div>
                            <div class="col-2">
                            <div class="row">Tên loại
                                </div>
                            </div>
                            <div class="col-2">
                                <a href="#" class="row">Số lượng</a>
                            </div>
                            <div class="col-2"><span class="close">Giá</span></div>
                            <a class="col-2" style="text-align: right;"> </a>
                        </div>
                    </div>
                    @foreach($giohang as $rows)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2" style="width:80px;height:80px"> <img class="img-fluid" src="{{asset('uploads/admin/'.$rows->Anh)}}"></div>
                            <div class="col-2">
                                <div class="row text-muted">{{$rows->TenDC}}</div>
                                
                            </div>
                            <div class="col-2">
                            <div class="row">@if(empty($dochoi->TenLoai))
                                {{ $rows->TenLoai }}
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="col-2">
                                <a href="#" class="border">{{$rows->SoLuong}}</a>
                            </div>
                            <div class="col-2"><span class="close">{{$rows->Gia}} vnđ</span></div>
                            <a class="col-2" style="text-align: right;" href="{{ route('xoagiohang', ['id' => $rows->MaDC]) }}"> X </a>
                        </div>
                    </div>
                    @endforeach
                    <div class="back-to-shop" style="display: flex;justify-content: space-evenly">
                    <div><a href="{{ route('main') }}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                   <div><span class="text-muted">Sản phẩm đã mua</span> <a href="{{route('sanphamdamua')}}">&rightarrow;</a></div>
                </div>
                    
            </div>
            <div class="col-md-4 summary">
                <h5><b>THÔNG TIN</b></h5>
                <hr>
                <div class="row">
                    <tr>
                        <th>Tên</th>
                        <td style="color:black"><input type="text" name="name" required></input></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td style="color:black"><input type="text" name="phone" required></input></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td style="color:black"><input type="text" name="address" required></input></td>
                    </tr>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TỔNG HÓA ĐƠN</div>
                        <div class="col text-right">{{$tongtien}} vnđ</div>
                    </div>
                </div>
                <button class="btn" type="submit">Tiến hành thanh toán</button>
            </div>

        </div>






    </div>
    <script src="/js/giohang.js"></script>




</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('/css/ttsanpham.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="{{asset('/fontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/fontend/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
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
                <a class="nav-link me-4 active" href="#billboard">TRANG CHỦ</a>
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
                    <li>
                      <a href="{{ route('giohang') }}">
                        <svg class="cart">
                          <use xlink:href="#cart"></use>
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
  <div class="head">
    <div class="thongtintrai" style="margin-top: 50px;">
      <img id="Anh" width="480px" height="200%" src="{{asset('uploads/admin/'.$chitiet->Anh)}}" alt="">
    </div>
    <div class="thongtinphai" style="margin-top: 50px;">
      <form action="{{route('themvaogiohang',['id' =>$chitiet->MaDC]) }}" method="POST" >
        @csrf
        <table>
          <tr>
            <td>
              <h2>{{$chitiet->TenDC}}</h2>
            </td>
          </tr>
          <tr>
            <td>
            @if(empty($dochoi->TenLoai))

            @else
            {{ $dochoi->TenLoai }}
            @endif
           
            </td>
          </tr>
          <tr>
            <td>
              <h2>{{ number_format($chitiet->GiaBan, 0, ',', '.') }} ₫<h2>
            </td>
          </tr>
          <tr>
            <td>Số lượng</td>
            <td>
            <input style="margin-left: -450px;" type="number" name="SoLuong" value="1" min="1">
            </td>
          </tr>
          <tr>
            <td>
              <p>{{$chitiet->MoTa}}</p>
            </td>
          </tr>
          <tr>
            <td><button type="submit">Thêm vào giỏ hàng</button></td>
          </tr>
        </table>
      </form>

    </div>
  </div>
</body>

</html>
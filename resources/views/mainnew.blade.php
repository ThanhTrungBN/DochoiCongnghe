<!DOCTYPE html>
<html>

<head>
  <title>Ministore</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link rel="stylesheet" href="{{asset('/fontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/fontend/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- script
    ================================================== -->
  <script src="{{asset('/fontend/js/modernizr.js')}}"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
  @include('SVG')
  <header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
    <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
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
  <section id="billboard" class="position-relative overflow-hidden bg-light-blue">
    <div class="swiper main-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-md-6">
                <div class="banner-content">
                  <h1 class="display-2 text-uppercase text-dark pb-5">BẠN THẬT TUYỆT VỜI.</h1>
                  <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">MUA SẮM SẢN PHẨM</a>
                </div>
              </div>
              <div class="col-md-5" style="margin-top: 74px;">
                <div class="image-holder">
                  <img src="/uploads/admin/flycam_header2.jpg" width="660px" height="100%" alt="banner">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
              <div class="col-md-6">
                <div class="banner-content">
                  <h1 class="display-2 text-uppercase text-dark pb-5">Technology Hack You Won't Get</h1>
                  <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
                </div>
              </div>
              <div class="col-md-5" style="margin-top: 75px;">
                <div class="image-holder">
                  <img src="/uploads/admin/kinh_header.jpg" width="660px" height="100%" alt="banner">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-prev">
      <svg class="chevron-left">
        <use xlink:href="#chevron-left" />
      </svg>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-next">
      <svg class="chevron-right">
        <use xlink:href="#chevron-right" />
      </svg>
    </div>
  </section>
  <section id="company-services" class="padding-large">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="cart-outline">
                <use xlink:href="#cart-outline" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">GIAO HÀNG MIỄN PHÍ</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="quality">
                <use xlink:href="#quality" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">ĐẢM BẢO CHẤT LƯỢNG</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="price-tag">
                <use xlink:href="#price-tag" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">ƯU ĐÃI HÀNG NGÀY</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="shield-plus">
                <use xlink:href="#shield-plus" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">THANH TOÁN AN TOÀN 100%</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">SẢN PHẨM ĐỒ CHƠI CÔNG NGHỆ</h2>
          <div class="btn-right">
            <a class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
          </div>
        </div>
        <div class="swiper product-swiper">
          <div class="swiper-wrapper">
            @foreach ($dochoi as $row )
            <a href="{{route('chitiet',['id' => $row->MaDC]) }}">
              <div class="swiper-slide" style="border-radius: 10px;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);height:97%">
                <div class="product-card position-relative">
                  <div class="image-holder" style="display: flex;justify-content: center;align-items: center;width: 310px; height: 260px;">
                    <img src="{{asset('uploads/admin/'.$row->Anh)}}" alt="product-item" style=" width: 300px; height: 240px; object-fit: cover;">
                  </div>
                  <div class="cart-concern position-absolute">
                    <div class="cart-button d-flex">
                    </div>
                  </div>
                  <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                    <h3 class="card-title text-uppercase" style="display: flex;justify-content: center;flex-wrap: wrap;">
                      <a style="display: flex;justify-content: center;width:270px" href="#">{{$row->TenDC}}</a><br>
                      <span style="display: flex;justify-content: center;width:270px" class="item-price text-primary" style="margin-right: 80px;">{{number_format($row->GiaBan, 0, ',', '.')}}</span>
                    </h3>
                  </div>
                </div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
      <div class="swiper-pagination position-absolute text-center"></div>
  </section>
  <section id="smart-watches" class="product-store padding-large position-relative">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">Robot công nghệ</h2>
          <div class="btn-right">
          </div>
        </div>
        <div class="swiper product-watch-swiper">
          <div class="swiper-wrapper">

            @foreach ($flycam as $row )
            <a href="{{route('chitiet',['id' => $row->MaDC]) }}">
            <div class="swiper-slide" style="border-radius: 10px;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);height:97%" >
              <div class="product-card position-relative">
                <div class="image-holder" style="display: flex;justify-content: center;align-items: center;width: 310px; height: 260px;">
                  <img src="{{asset('uploads/admin/'.$row->Anh)}}" alt="product-item" style=" width: 300px; height: 240px; object-fit: cover;">
                </div>
                <div class="cart-concern position-absolute">
                  <div class="cart-button d-flex">

                  </div>
                </div>
                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                  <h3 class="card-title text-uppercase" style="display: flex;justify-content: center;flex-wrap: wrap;">
                    <a style="display: flex;justify-content: center;width:270px" href="#">{{$row->TenDC}} </a><br>
                    <span style="display: flex;justify-content: center;width:270px" class="item-price text-primary" style="margin-right: 80px;">{{number_format($row->GiaBan, 0, ',', '.')}}</span>
                  </h3>
                </div>
              </div>
            </div>
            </a>
            @endforeach

          </div>
        </div>
      </div>



      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">Đồng hồ công nghệ</h2>
          <div class="btn-right">
          </div>
        </div>
        <div class="swiper product-watch-swiper">
          <div class="swiper-wrapper">

            @foreach ($kinh as $row )
            <a href="{{route('chitiet',['id' => $row->MaDC]) }}">
            <div class="swiper-slide" style="border-radius: 10px;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);height:97%" >
              <div class="product-card position-relative">
                <div class="image-holder" style="display: flex;justify-content: center;align-items: center;width: 310px; height: 260px;">
                  <img src="{{asset('uploads/admin/'.$row->Anh)}}" alt="product-item" style=" width: 300px; height: 240px; object-fit: cover;">
                </div>
                <div class="cart-concern position-absolute">
                  <div class="cart-button d-flex">

                  </div>
                </div>
                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                  <h3 class="card-title text-uppercase" style="display: flex;justify-content: center;flex-wrap: wrap;">
                    <a style="display: flex;justify-content: center;width:270px" href="#">{{$row->TenDC}} </a><br>
                    <span style="display: flex;justify-content: center;width:270px" class="item-price text-primary" style="margin-right: 80px;">{{number_format($row->GiaBan, 0, ',', '.')}}</span>
                  </h3>
                </div>
              </div>
            </div>
            </a>
            @endforeach

          </div>
        </div>
      </div>



    </div>
    <div class="swiper-pagination position-absolute text-center"></div>
  </section>
  <section id="instagram" class="padding-large overflow-hidden no-padding-top">
    <div class="container">
    </div>
  </section>
  <footer id="footer" class="overflow-hidden">
    <div class="container">
      <div class="row">
        <div class="footer-top-area">
          <div class="row d-flex flex-wrap justify-content-between">

            <div class="col-lg-2 col-sm-6 pb-3">
              <div class="footer-menu text-uppercase">
                <h5 class="widget-title pb-2">ĐƯỜNG DẪN NHANH</h5>
                <ul class="menu-list list-unstyled text-uppercase">
                  <li class="menu-item pb-2">
                    <a href="#">
                      Trang chủ</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">About</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">Cửa hàng</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">Blogs</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">Liên hệ</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu text-uppercase">
                <h5 class="widget-title pb-2">Trợ giúp & Thông tin Trợ giúp</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item pb-2">
                    <a href="#">Track Your Order</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">
                      Theo dõi đơn hàng của bạn</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">Vận chuyển + Giao hàng</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">Liên hệ chúng tôi
                    </a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">Câu hỏi thường gặp</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu contact-item">
                <h5 class="widget-title text-uppercase pb-2">Contact Us</h5>
                <p>
                  Bạn có bất kỳ thắc mắc hoặc gợi ý nào không? <a href="mailto:">hehe@gmail.com</a>
                </p>
                <p>Nếu bạn cần hỗ trợ? hãy liên hệ chúng tôi. <a href="">+12345679JQK</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </footer>

  <script src="{{asset('fontend/js/jquery-1.11.0.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="{{asset('fontend/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('fontend/js/plugins.js')}}"></script>
  <script type="text/javascript" src="{{asset('fontend/js/script.js')}}"></script>
</body>

</html>
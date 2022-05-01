<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 147 Triều Khúc - Thanh Xuân- Hà Nội</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0358. 250. 370</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if (Auth::check() && Auth::user()->role == 5)
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            {{ Auth::user()->khach_hang->ho_ten }}<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li style="border: none;"><a href="{{ route('pages.getThongtinUser') }}" style="width:200px"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản</a>
                            </li>
                            <li><a href="{{ route('pages.getLichsu') }}" style="width:200px"><i class="fa fa-user fa-fw"></i> Lịch sử đặt hàng</a>
                            </li>
                            <li><a href="{{ route('pages.getMatkhauUser') }}" style="width:200px"><i class="fa fa-user fa-fw"></i> Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('pages.getDangxuat') }}">Đăng xuất <i class="fa fa-sign-out fa-fw"></i></a></li>
                    @else
                    <li><a href="{{ route('pages.getDangky') }}">Đăng ký</a></li>
                    <li><a href="{{ route('pages.dangnhap') }}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="{{ asset('../images/logo.jpg') }}" height="70px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{ route('pages.timkiem') }}">
                        <input type="text" value="" name="keyname" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><a href="{{ route('pages.giohang') }}"><i class="fa fa-shopping-cart"></i>
                            Giỏ hàng (@if (Session::has('Carts')) {{ $count }} @else Trống)
                        @endif)</a></div>
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach ($danhmuc as $muc)
                            <li><a href="{{ route('pages.sanpham', ['slug'=>$muc->slug,'id_muc'=>$muc->id]) }}">{{ $muc->ten_danh_muc }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('pages.gioithieu') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('pages.lienhe') }}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

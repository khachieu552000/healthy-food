@extends('pages.layouts.layout')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')

<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer" >

                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 500px; width:100%">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="{{ asset('images/slide/slide1.png') }}" style="width:100%" alt="">
                      </div>

                      <div class="item">
                        <img src="{{ asset('images/slide/banner1.jpeg') }}" style="width:100%" alt="">
                      </div>

                      <div class="item">
                        <img src="{{ asset('images/slide/slide2.jpg') }}" style="width:100%" alt="">
                      </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
                <!--slider-->
</div>
<div class="content">
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-12">
                    @if (count($tops)==0)
                    @else
                    <div class="beta-products-list">
                        <div class="single-title"><h4>SẢN PHẨM NỔI BẬT</h4></div>
                        <div class="space30">&nbsp;</div>
                        <div class="row">
                            @if (isset($tops))
                            @foreach ($tops as $top)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('pages.chitietsanpham', ['muc_slug'=>$top->danh_muc->slug,'danh_muc_id'=>$top->danh_muc_id,'sp_slug'=>$top->slug,'id_sp'=>$top->id]) }}"><img src="{{ asset($top->hinh_anh) }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <a href="{{ route('pages.chitietsanpham', ['muc_slug'=>$top->danh_muc->slug,'danh_muc_id'=>$top->danh_muc_id,'sp_slug'=>$top->slug,'id_sp'=>$top->id]) }}" class="single-item-title"><p class="productss">{{ $top->ten_san_pham }}</p></a>
                                        <p class="single-item-price">
                                            <span>Giá: {{ number_format($top->don_gia_ban) }} VNĐ</span>
                                        </p>
                                    </div>
                                    @if ($top->so_luong > 0)
                                    <div class="single-item-caption">
                                        <a class="beta-btn primary" onclick="addCart({{ $top->id }})" data-id="{{ $top->id }}">Thêm giỏ hàng</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @else
                                    <div class="single-item-caption">
                                        <a class="beta-btn primary" style="pointer-events: none; border-color: #ffffff; background-color: #6bada8" onclick="addCart({{ $top->id }})" data-id="{{ $top->id }}">Thêm giỏ hàng</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            @endforeach
                            @endif
                        </div>
                        <div class="paginate">{{ $tops->links() }}</div>
                    </div> <!-- .beta-products-list -->
                    @endif
                    <div class="beta-products-list">
                        <div class="single-title"><h4>TẤT CẢ SẢN PHẨM</h4></div>
                        <div class="space30">&nbsp;</div>
                        <div class="row">
                            @if (isset($alls))
                            @foreach ($alls as $all)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('pages.chitietsanpham',['muc_slug'=>$all->danh_muc->slug,'danh_muc_id'=>$all->danh_muc_id,'sp_slug'=>$all->slug,'id_sp'=> $all->id]) }}"><img src="{{ asset($all->hinh_anh) }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <a href="{{ route('pages.chitietsanpham',['muc_slug'=>$all->danh_muc->slug,'danh_muc_id'=>$all->danh_muc_id,'sp_slug'=>$all->slug,'id_sp'=> $all->id]) }}" class="single-item-title"><p class = "productss">{{ $all->ten_san_pham }}</p> </a>
                                        <p class="single-item-price">
                                            <span>Giá: {{ number_format($all->don_gia_ban) }} VNĐ</span>
                                        </p>
                                    </div>
                                    @if ($all->so_luong >0)
                                    <div class="single-item-caption">
                                        <a class="beta-btn primary" onclick="addCart({{ $all->id }})" data-id="{{ $all->id }}">Thêm giỏ hàng</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @else
                                    <div class="single-item-caption">
                                        <a class="beta-btn primary" style="pointer-events: none; border-color: #ffffff; background-color: #6bada8" onclick="addCart({{ $all->id }})" data-id="{{ $all->id }}">Thêm giỏ hàng</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div> <!-- .beta-products-list -->
                        <div class="paginate">{{ $alls->links() }}</div>
                    </div>
                </div>
            </div> <!-- end section with sidebar and main content -->

        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->

<div class="intro">
    <div class="container">
        <div class="intro-content">
            <h2>Tại sao nên chọn AloBee ?</h2>
            <p>AloBee Healthy Food Việt Nam khởi nguồn từ những con người quý trọng sức khoẻ, yêu thực phẩm sạch và mong muốn lan toả điều đó đến đông đảo mọi người.
                Vì vậy muón có những chiếc bánh ngon, trước tiên hãy tạo ra môi trường lành mạnh.
            </p>
            <p>Hơn ai hết, AloBee hiểu được vấn đề vệ sinh an toàn thực phẩm luôn được khách hàng đặt lên hàng đầu. Bởi dù bánh có ngon, thành phần có lành mạnh nhưng nếu quy trình sản xuất không an toàn thì chiếc bánh đó cũng trở nên mất giá trị.
                Tại AloBee, khi bắt đầu manh nha ý tưởng làm bánh healthy, điều đầu tiên chúng mình quan tâm đó là phải có bếp bánh đạt chuẩn, đáp ứng mọi tiêu chí khắt khe về vệ sinh, yêu cầu đủ công năng và đảm bảo an toàn
                Đó là lí do xưởng bánh của chúng mình luôn được cẩn thận đầu tư, chăm chút đến từng góc nhỏ vì thú thật, cô chủ cầu toàn lắm, cái gì cũng phải chỉn chu thì mới đem lại hiệu quả cao…</p>
        </div>
    </div>
</div>

<div class="services">
    <div class="container">
        <div class="row" style="text-align: center">
            <div class="col-sm-4">
                <div class="services-item">
                    <div class="services-item-header">
                        <img src="{{ asset('images/website/an-toan-thuc-pham.jpg') }}" alt="">
                    </div>
                    <div class="services-item-body">
                        <h3>Sức khoẻ</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="services-item">
                    <div class="services-item-header">
                        <img src="{{ asset('images/website/datchuan.jpg') }}" alt="">
                    </div>
                    <div class="services-item-body">
                        <h3>Đạt chuẩn Eatclean</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="services-item">
                    <div class="services-item-header">
                        <img src="{{ asset('images/website/gia-ca.png') }}" alt="">
                    </div>
                    <div class="services-item-body">
                        <h3>Giá cả phù hợp</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


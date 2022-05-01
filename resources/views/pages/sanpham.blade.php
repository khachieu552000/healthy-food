@extends('pages.layouts.layout')
@section('title')
    <title>Danh sách sản phẩm</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <span>{{ $danhmuc->ten_danh_muc }}</span>
    <div class="clearfix"></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar-content">
                        <section id="title-menu">
                            <h2 class="widget-title">Danh mục sản phẩm</h2>
                            <ul id="menu-items">
                                @foreach ($menu as $item)
                                    <li class="item-menu-product">
                                        <a href="{{ route('pages.sanpham', ['slug'=>$item->slug,'id_muc'=>$item->id]) }}" class="nav-item">{{ $item->ten_danh_muc }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                        <section id="contact-menu">
                            <h2 class="widget-title">Hỗ trợ trực tuyến</h2>
                            <img src="{{ asset('images/website/support.gif') }}" alt="">
                            <ul id="menu-items">
                                <li class="item-menu-product"> <i class="fa fa-phone-square"></i> + 0358. 250. 370 </li>
                                <li class="item-menu-product"> <i class="fa fa-envelope"></i> alobee@gmail.com </li>
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>{{ $danhmuc->ten_danh_muc}}</h4>

                        <div class="row">
                            @foreach ($sanpham as $sp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('pages.chitietsanpham',['muc_slug'=>$sp->danh_muc->slug,'danh_muc_id'=>$sp->danh_muc_id,'sp_slug'=>$sp->slug,'id_sp'=> $sp->id]) }}"><img src="{{ asset($sp->hinh_anh) }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <a href="{{ route('pages.chitietsanpham',['muc_slug'=>$sp->danh_muc->slug,'danh_muc_id'=>$sp->danh_muc_id,'sp_slug'=>$sp->slug,'slug'=>$sp->slug,'id_sp'=> $sp->id]) }}" class="single-item-title">{{ $sp->ten_san_pham }}</a>
                                        <p class="single-item-price">
                                            <span>{{ number_format($sp->don_gia_ban) }} VNĐ</span>
                                        </p>
                                    </div>
                                    @if ($sp->so_luong > 0)
                                    <div class="single-item-caption">
                                        <a class="beta-btn primary" onclick="addCart({{ $sp->id }})" data-id="{{ $sp->id }}">Thêm vào giỏ hàng</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @else
                                    <div class="single-item-caption">
                                        <a class="beta-btn primary" style="pointer-events: none; border-color: #ffffff; background-color: #6bada8" onclick="addCart({{ $sp->id }})" data-id="{{ $sp->id }}">Thêm vào giỏ hàng</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="paginate">{{ $sanpham->links() }}</div>
                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                </div>
            </div> <!-- end section with sidebar and main content -->

        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

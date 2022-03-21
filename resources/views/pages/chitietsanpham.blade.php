@extends('pages.layouts.layout')
@section('title')
    <title>Chi tiết sản phẩm</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="">{{ $chitiet->danh_muc->ten_danh_muc }}</a> /
    <a href="">{{ $chitiet->ten_san_pham }}</a>
    <div class="clearfix"></div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
                <div class="row">
                    <div class="col-sm-5">
                        <img src="{{ asset($chitiet->hinh_anh) }}" alt="">
                    </div>
                    <div class="col-sm-7">
                        <div class="single-item-body">
                            <p class="single-item-title"><h3>{{ $chitiet->ten_san_pham }}</h3></p>
                            <p>{!! $chitiet->ghi_chu !!}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p class="single-item-price">
                                <i>Đã bán: {{ $chitiet->da_ban }}</i>
                            </p>
                            <p class="single-item-price">
                                <i>Tình trạng: @if ($chitiet->so_luong == 0) {{ 'Hết hàng' }}
                                    @else {{ 'Còn hàng' }}

                                @endif</i>
                            </p>
                            <p class="single-item-price">
                                <i>Giá: {{ number_format($chitiet->don_gia_ban) }} VNĐ</i>
                            </p>
                        </div>

                        <div class="single-item-options">
                            <a class="beta-btn primary" href="{{ route('pages.muangay', ['muc_slug'=>$chitiet->danh_muc->slug,'danh_muc_id'=>$chitiet->danh_muc_id,'sp_slug'=>$chitiet->slug,'id'=>$chitiet->id]) }}">Mua ngay</a>
                            <div class="clearfix"></div>
                        </div>
                </div>
                </div>

                <div class="space90">&nbsp;</div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">MÔ TẢ</a></li>
                    <li><a data-toggle="tab" href="#menu1">CÁCH MUA HÀNG</a></li>
                    <li><a data-toggle="tab" href="#menu2">CÁCH THANH TOÁN</a></li>
                  </ul>

                  <div class="tab-content p20 pl20 pr20">
                    <div id="home" class="tab-pane fade in active">
                      <p>{!! $chitiet->ghi_chu !!}</p>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <p>AloBee Healthy Food Việt Nam xin kính chào quý khách.</p>
                      <b style="font-size: 15px">Quý khách có thể mua hàng của chúng tôi dưới 4 hình thức:</b>
                      <ul style="font-size: 15px">
                          <li>Đến trực tiếp trải nghiệm và chọn mua (Địa chỉ: 147 Triều Khúc, Thanh Xuân, Hà Nội).</li>
                          <li>Đặt hàng qua Điện thoại, Zalo (Quý khách có thế liên hệ số điện thoại: 0358. 250. 370).</li>
                          <li>Đặt hàng online trực tiếp trên website.</li>
                          <li>Đặt hàng trên ứng dụng shoppe hoặc fanpage facebook của cửa hàng.</li>
                      </ul>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                      <p>AloBee Healthy Food Việt Nam hiện chấp nhận một số hình thức thanh toán dưới đây:</p>
                      <ul style="font-size: 15px">
                          <li><b>Thanh toán bằng tiền mặt: </b>
                            Quý khách có thể thanh toán bằng tiền mặt trực tiếp cho nhân viên bán hàng tại các cửa hàng hoặc nhân viên giao hàng. Lưu ý chỉ thanh toán khi có hóa đơn hoặc được xác nhận trực tiếp từ cán bộ quản lý cửa hàng bằng điện thoại, Zalo, email.
                          </li>
                          <li><b>Thanh toán qua chuyển khoản ngân hàng: </b>
                            Quý khách có thể thanh toán qua một trong các số tài khoản dưới đây của AloBee Healthy Food Việt Nam</li>
                      </ul>
                    </div>
                  </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>SẢN PHẨM TƯƠNG TỰ</h4>

                    <div class="row">
                        @php
                            $i = 1
                        @endphp
                        @foreach ($chitiet->danh_muc->san_pham as $item)
                        @if ($item->id != $chitiet->id)
                            @if ($i<5)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route('pages.chitietsanpham', ['muc_slug'=>$item->danh_muc->slug,'danh_muc_id'=>$item->danh_muc_id,'sp_slug'=>$item->slug,'id_sp'=>$item->id]) }}"><img src="{{ asset($item->hinh_anh) }}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <a href="{{ route('pages.chitietsanpham', ['muc_slug'=>$item->danh_muc->slug,'danh_muc_id'=>$item->danh_muc_id,'sp_slug'=>$item->slug,'id_sp'=>$item->id]) }}" class="single-item-title">{{ $item->ten_san_pham }}</a>
                                            <p class="single-item-price">
                                                <span>Giá: {{ number_format($item->don_gia_ban) }} VNĐ</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="beta-btn primary" onclick="addCart({{ $item->id }})" data-id="{{ $item->id }}">Thêm giỏ hàng</a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $i++
                                @endphp
                            @endif
                        @endif
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection

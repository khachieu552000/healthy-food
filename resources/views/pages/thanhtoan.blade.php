@extends('pages.layouts.layout')
@section('title')
    <title>Thanh toán hoá đơn</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.getThanhtoan') }}">Thanh toán</a>
    <div class="clearfix"></div>
</div>

<div class="container">
    <div id="content">
        @if (Auth::check() && Auth::user()->role === 5)
        <form action="{{ route('pages.postThanhtoan') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Thông tin thanh toán</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="ho_ten">Họ tên <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập họ tên" value="{{ Auth::user()->khach_hang->ho_ten }}" required>
                    </div>

                    <div class="form-block">
                        <label for="ngay_sinh">Ngày sinh <span style="color: red">*</span></label>
                        <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" placeholder="Nhập ngày sinh" value="{{ Auth::user()->khach_hang->ngay_sinh }}" required>
                    </div>

                    <div class="form-block">
                        <label for="dien_thoai">Số điện thoại <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="dien_thoai" name="dien_thoai" placeholder="Nhập số điện thoại" value="{{ Auth::user()->khach_hang->dien_thoai }}" required>
                    </div>

                    <div class="form-block">
                        <label for="email">Email <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Nhập email" disabled>
                    </div>

                    <div class="form-block">
                        <label for="dia_chi">Địa chỉ <span style="color: red">*</span></label>
                        <textarea id="dia_chi" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ">{{ Auth::user()->khach_hang->dia_chi }}</textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body">
                            @if (Session::has('Carts')!=null)
                            @foreach (Session::get('Carts')->sanpham as $item)
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                    <div class="media">
                                        <img width="35%" src="{{ asset($item['sanphamInfo']->hinh_anh) }}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <img src="" alt="">
                                            <p class="font-large">{{ $item['sanphamInfo']->ten_san_pham }}</p>
                                            <span class="color-gray your-order-info">Giá: {{ $item['sanphamInfo']->don_gia_ban }}</span>
                                            <span class="color-gray your-order-info">Số lượng: {{ $item['so_luong'] }}</span>
                                        </div>
                                    </div>
                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng số tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{ number_format(Session::get('Carts')->tonggia) }}</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                               <i>(*) Lưu ý: Thông tin cá nhân của bạn sẽ được sủ dụng để xử lý đơn hàng, tăng trải nghiệm website.</i>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary">Thanh toán</button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
        @else
        <form action="{{ route('pages.postThanhtoan1') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Thông tin thanh toán</h4>
                    <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="ho_ten">Họ tên <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập họ tên" required>
                        </div>

                        <div class="form-block">
                            <label for="ngay_sinh">Ngày sinh <span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" placeholder="Nhập ngày sinh" required>
                        </div>

                        <div class="form-block">
                            <label for="dien_thoai">Số điện thoại <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="dien_thoai" name="dien_thoai" placeholder="Nhập số điện thoại" required>
                        </div>

                        <div class="form-block">
                            <label for="dia_chi">Địa chỉ <span style="color: red">*</span></label>
                            <textarea id="dia_chi" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ"></textarea>
                        </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body">
                            @if (Session::has('Carts')!=null)
                            @foreach (Session::get('Carts')->sanpham as $item)
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                    <div class="media">
                                        <img width="35%" src="{{ asset($item['sanphamInfo']->hinh_anh) }}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <img src="" alt="">
                                            <p class="font-large">{{ $item['sanphamInfo']->ten_san_pham }}</p>
                                            <span class="color-gray your-order-info">Giá: {{ $item['sanphamInfo']->don_gia_ban }}</span>
                                            <span class="color-gray your-order-info">Số lượng: {{ $item['so_luong'] }}</span>
                                        </div>
                                    </div>
                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng số tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{ number_format(Session::get('Carts')->tonggia) }}</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                               <i>(*) Lưu ý: Thông tin cá nhân của bạn sẽ được sủ dụng để xử lý đơn hàng, tăng trải nghiệm website.</i>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary">Thanh toán</button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
        @endif
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

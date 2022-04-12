@extends('pages.layouts.layout')
@section('title')
    <title>Thông tin liên hệ</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.lienhe') }}">Liên hệ</a>
    <div class="clearfix"></div>
</div>
<div class="space30">&nbsp;</div>
<div class="beta-map">
    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2583607344177!2d105.79862331437752!3d20.98227819474067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc3e929915b%3A0x1ee7839acfc797b2!2zMTQ3IFAuIFRyaeG7gXUgS2jDumMsIFTDom4gVHJp4buBdSwgSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1647509527705!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h4>ĐỂ LẠI LỜI NHẮN</h4>
                <div class="space20">&nbsp;</div>
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                        {{ $err }}
                        @endforeach
                    </div>
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <form action="{{ route('pages.postLienhe') }}" method="post" class="contact-form">
                    @csrf
                    <div class="form-block">
                        <input class="form-control" name="ho_ten" type="text" placeholder="Họ tên">
                    </div>
                    <div class="form-block">
                        <input class="form-control" name="email" type="email" placeholder="Email">
                    </div>
                    <div class="form-block">
                        <input class="form-control" name="dien_thoai" type="text" placeholder="Số điện thoại">
                    </div>
                    <div class="form-block">
                        <textarea class="form-control" rows="10" name="noi_dung" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi ngay</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h4>THÔNG TIN LIÊN HỆ</h4>
                <div class="space20">&nbsp;</div>
                <i class="fa fa-map-marker contact-title" aria-hidden="true"> Địa chỉ:</i>
                <p>
                    147 Triều Khúc - Thanh Xuân- Hà Nội
                </p>
                <div class="space20">&nbsp;</div>
                <i class="fa fa-phone-square contact-title" aria-hidden="true"> Điện thoại:</i>
                <p>
                    <a href="tel:+0358. 250. 370">0358. 250. 370</a>
                </p>
                <div class="space20">&nbsp;</div>
                <i class="fa fa-envelope contact-title" aria-hidden="true">  Email:</i>
                <p>
                    <a href="mailto:alobee@gmail.com">alobee@gmail.com</a>
                </p>
                <div class="space20">&nbsp;</div>
                <i class="fa fa-clock-o contact-title" aria-hidden="true">  Mở cửa: </i>
                <p>
                    Từ 07:00 - 18:00 tất cả các ngày trong tuần
                </p>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

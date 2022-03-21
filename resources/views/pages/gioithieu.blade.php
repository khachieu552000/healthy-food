@extends('pages.layouts.layout')
@section('title')
    <title>Giới thiệu</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.gioithieu') }}">Giới thiệu</a>
    <div class="clearfix"></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <div class="introduce">
                    <h4 class="introduce-title">AloBee Healthy Food Việt Nam</h4>
                    <div class="space20">&nbsp;</div>
                    <p class="introduce-content">“MUỐN CÓ NHỮNG CHIẾC BÁNH NGON, TRƯỚC TIÊN HÃY TẠO RA MÔI TRƯỜNG LÀNH MẠNH”</p>
                    <p class="introduce-content"> Hơn ai hết, AloBee hiểu được vấn đề vệ sinh an toàn thực phẩm luôn được khách hàng đặt lên hàng đầu.
                        Bởi dù bánh có ngon, thành phần có lành mạnh nhưng nếu quy trình sản xuất không an toàn thì chiếc bánh đó cũng trở nên mất giá trị.</p>
                    <p class="introduce-content">Tại AloBee, khi bắt đầu manh nha ý tưởng làm bánh healthy, điều đầu tiên chúng mình quan tâm đó là phải có bếp bánh đạt chuẩn, đáp ứng mọi tiêu chí khắt khe về vệ sinh, yêu cầu đủ công năng và đảm bảo an toàn
                        Đó là lí do xưởng bánh của chúng mình luôn được cẩn thận đầu tư, chăm chút đến từng góc nhỏ vì thú thật, cô chủ cầu toàn lắm, cái gì cũng phải chỉn chu thì mới đem lại hiệu quả cao…</p>
                </div>
            </div>
            <div class="col-sm-4">
                <img src="{{ asset('images/website/gioi-thieu.jpg') }}" alt="">
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
<div class="space40">&nbsp;</div>
@endsection

@extends('pages.layouts.layout')
@section('title')
    <title>Đăng ký</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
     <a href="{{ route('pages.getDangky') }}">Đăng ký</a>
    <div class="clearfix"></div>
</div>
<div class="container">
    <div id="content">
        <form action="{{ route('pages.postDangKy') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng ký</h4>
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
                            @foreach ($errors->all() as $err)
                            {{ $err }}
                            @endforeach
                        </div>
                    @endif
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            <button class="close" type="botton" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
                            {{ session('thongbao') }}
                        </div>
                    @endif
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="email">Email <span style="color: red">*</span></label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-block">
                        <label for="ho_ten">Họ tên <span style="color: red">*</span></label>
                        <input class="form-control" type="text" id="ho_ten" name="ho_ten" placeholder="Họ và tên" required>
                    </div>

                    <div class="form-block">
                        <label for="ngay_sinh">Ngày sinh <span style="color: red">*</span></label>
                        <input class="form-control" type="date" id="ngay_sinh" name="ngay_sinh" placeholder="Ngày sinh" required>
                    </div>

                    <div class="form-block">
                        <label for="dia_chi">Địa chỉ <span style="color: red">*</span></label>
                        <input class="form-control" type="text" id="dia_chi" name="dia_chi" placeholder="Địa chỉ" required>
                    </div>


                    <div class="form-block">
                        <label for="dien_thoai">Số điện thoại <span style="color: red">*</span></label>
                        <input class="form-control" type="text" id="dien_thoai" name="dien_thoai" placeholder="Số điện thoại" required>
                    </div>
                    <div class="form-block">
                        <label for="password">Mật khẩu <span style="color: red">*</span></label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Mật khẩu" required>
                        <small class="form-text text-muted ml-3 pull-right">Các trường có dấu (<span style="color: red">*</span>) không được để trống!</small>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary pull-right">Đăng ký</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

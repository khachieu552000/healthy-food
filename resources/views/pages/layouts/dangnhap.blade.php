@extends('pages.layouts.layout')
@section('title')
    <title>Đăng nhập</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.dangnhap') }}">Đăng nhập</a>
    <div class="clearfix"></div>
</div>

<div class="container">
    <div id="content">
        <form action="{{ route('pages.postDangnhap') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 with40">
                    <h4>Đăng nhập</h4>
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
                        @foreach ($errors->all() as $err)
                        {{ $err }}
                        @endforeach
                    </div>
                    @endif
                    @if (session('thongbao'))
                    <div class="alert alert-danger">
                        <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
                        {{ session('thongbao') }}
                    </div>
                    @endif
                    @if (session('thongbao1'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
                        {{ session('thongbao1') }}
                    </div>
                    @endif
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Tài khoản</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Mật khẩu" required>
                        <div class="checkbox pull-right">
                            <label><input name="remember" type="checkbox" value="">Ghi nhớ đăng nhập</label>
                          </div>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary pull-right">Đăng nhập</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
    <div class="space90">&nbsp;</div>
</div> <!-- .container -->

@endsection

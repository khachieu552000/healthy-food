@extends('pages.layouts.layout')
@section('title')
    <title>Thông tin cá nhân</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.getThongtinUser') }}">Thông tin cá nhân</a>
    <div class="clearfix"></div>
</div>
<div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin cá nhân</h1>
            </div>
        </div>
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
        @foreach($errors->all() as $err)
        {{ $err }}
        @endforeach
    </div>
    @endif
    @if (session('thongbao'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true"></button>
        {{ session('thongbao') }}
    </div>
    @endif
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('pages.postThongtinUser') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ho_ten">Họ tên</label>
                        <input type="text" class="form-control" id="ho_ten" placeholder="Họ và tên" name="ho_ten" value="{{ Auth::user()->khach_hang->ho_ten }}"
                            autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ Auth::user()->email }}"
                            autocomplete="off" disabled />
                    </div>

                    <div class="form-group">
                        <label for="dien_thoai">Điện thoại</label>
                        <input type="text" class="form-control" id="dien_thoai" placeholder="Số điện thoại" name="dien_thoai" value="{{ Auth::user()->khach_hang->dien_thoai }}"
                            autocomplete="off" />
                    </div>

                    <div class="form-group" style="width: 40%;">
                        <label for="ngay_sinh">Ngày sinh</label>
                        <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ Auth::user()->khach_hang->ngay_sinh }}"
                            autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ</label>
                        <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ Auth::user()->khach_hang->dia_chi }}"
                            placeholder="Địa chỉ" />
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="space90">&nbsp;</div>

@endsection

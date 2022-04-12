@extends('admin.layouts.layout')

@section('head')
    <title>Trang chủ</title>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Trang chủ</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-pied-piper-pp fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý danh mục</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('Danhmuc.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-product-hunt fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý sản phẩm</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.sanpham.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-paste fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý hoá đơn</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.hoadon.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý khách hàng</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.khachhang.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    @if(Auth::user()->role == 1)
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý nhân viên</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.nhanvien.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    @endif

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sliders fa-5x"></i></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý liên hệ</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.lienhe.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    @if (Auth::user()->role ==1 )
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Thống kê</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.thongke.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>
@endsection

@extends('admin.layouts.layout')

@section('head')
    <title>Danh sách sản phẩm</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
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
    <div class="row">
        <div class="col-lg-12">
            <p>
                <a class="btn btn-primary" href="{{ route('admin.sanpham.getThem') }}"> <i class="fa fa-plus"></i>
                    Thêm sản phẩm</a>
            <p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách sản phẩm
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Danh mục</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá bán</th>
                                    <th>Thuộc tính</th>
                                    <th>Mô tả</th>
                                    <th>Chức năng</th>
                            </thead>
                            <tbody>
                                @if (isset($sanpham))
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($sanpham as $sp)
                                        <tr class="odd gradeX">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $sp->danh_muc?$sp->danh_muc->ten_danh_muc:'' }}</td>
                                            <td>{{ $sp->ten_san_pham }}</td>
                                            <td><img src="{{ asset($sp->hinh_anh) }}" alt="" width="220px" height="150px"></td>
                                            <td>{{ $sp->so_luong }}</td>
                                            <td>{{ number_format($sp->don_gia_ban) }} VNĐ</td>
                                            <td>{!! $sp->thuoc_tinh !!}</td>
                                            <td>{!! $sp->mo_ta !!}</td>
                                            <td>
                                                <a class="btn btn-success btn-xs btn-edit"
                                                    href="{{ route('admin.sanpham.getSua', ['id'=>$sp->id]) }}"><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.sanpham.getXoa', ['id'=>$sp->id]) }}"
                                                    onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>
                                            </td>
                                        </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('script')

@endsection

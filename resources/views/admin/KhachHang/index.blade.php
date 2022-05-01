@extends('admin.layouts.layout')

@section('head')
    <title>Quản lý khách hàng</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách tài khoản khách hàng</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p>
                <a class="btn btn-primary" href=""> <i class="fa fa-plus"></i> Thêm mới</a>
            <p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách tài khoản khách hàng
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($khachhang))
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($khachhang as $kh)
                                            <tr class="odd gradeX">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $kh->ho_ten }}</td>
                                                <td>{{ $kh->users ? $kh->users->email:'' }}</td>
                                                <td>{{ $kh->dien_thoai }}</td>
                                                <td>{{ date('d/m/Y', strtotime($kh->ngay_sinh )) }}</td>
                                                <td>{{ $kh->dia_chi }}</td>
                                                <td>
                                                    <a class="btn btn-warning btn-xs"
                                                    href="" ​><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="" onclick="return ConfirmDelete()" ​><i class="fa fa-edit"></i> Xoá</a>
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

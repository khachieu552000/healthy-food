@extends('admin.layouts.layout')

@section('head')
    <title>Quản lý nhân viên</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách tài khoản nhân viên</h1>
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
                <a class="btn btn-primary" href="{{ route('admin.nhanvien.getThem') }}"> <i class="fa fa-plus"></i>Thêm mới</a>
            <p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách tài khoản nhân viên</div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($user))
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($user as $us)
                                    @if($us->nhan_vien)
                                        <tr class="odd gradeX">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $us->nhan_vien->ho_ten }}</td>
                                            <td>{{ $us->email }}</td>
                                            <td>{{ date('d/m/Y', strtotime($us->nhan_vien->ngay_sinh)) }}</td>
                                            <td>{{ $us->nhan_vien->gioi_tinh }}</td>
                                            <td>{{ $us->nhan_vien->dien_thoai }}</td>
                                            <td>{{ $us->nhan_vien->dia_chi }}</td>
                                            <td>
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ route('admin.nhanvien.getSua', ['id' => $us->id]) }}" ​><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.nhanvien.getXoa', ['id' => $us->id]) }}" onclick="return ConfirmDelete()" ​><i class="fa fa-edit"></i> Xoá</a>
                                            </td>
                                        </tr>
                                    @endif
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

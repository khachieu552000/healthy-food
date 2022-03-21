@extends('admin.layouts.layout')

@section('head')
    <title>Slide</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slide</h1>
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
                <a class="btn btn-primary" href="{{ route('admin.slide.getThem') }}"> <i class="fa fa-plus"></i>
                    Thêm slide</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách danh mục
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th style="text-align: center;">Tên slide</th>
                                    <th style="text-align: center;">Hình ảnh</th>
                                    <th style="text-align: center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($slide))
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($slide as $slide)
                                <tr class="odd gradeX">
                                    <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                    </td>
                                    <td style="text-align: center;">{{ $slide->ten_slide }}</td>
                                    <td class="" style="text-align: center">
                                        <img src="{{ asset($slide->hinh_anh) }}" alt="" srcset="" width="220px" height="150px"></td>
                                    <td class="center" style="text-align: center;">
                                        <a class="btn btn-danger btn-xs"
                                            href="{{ route('admin.slide.getXoa', ['id'=>$slide->id]) }}"
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

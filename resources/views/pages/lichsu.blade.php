@extends('pages.layouts.layout')
@section('title')
    <title>Lịch sử đặt hàng</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.getLichsu') }}">Lịch sử đặt hàng</a>
    <div class="clearfix"></div>
</div>
<div class="container">
    <div class="main-content">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách đơn hàng</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="table-admin">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã hoá đơn</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($hoadon))
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($hoadon as $hd)
                                <tr class="odd gradeX">
                                    <td>{{ $i++ }}</td>
                                    <td><b> MHD{{ $hd->id }}</b></td>
                                    <td>{{ date('d-m-Y', strtotime($hd->ngay_lap)) }}</td>
                                    <td>{{ number_format($hd->tong_tien) }} VNĐ</td>
                                    <td>
                                        @if ($hd->status == 0)
                                            <span style="color: rgb(25, 46, 231)">Chờ xác nhận</span>
                                        @elseif ($hd->status == 1)
                                            <span style="color: green">Đã xác nhận</span>
                                        @elseif($hd->status == 2)
                                            <span style="color: green">Đang giao hàng</span>
                                        @elseif($hd->status == 3)
                                            <span style="color: green">Đã thanh toán</span>
                                        @elseif($hd->status == -1)
                                            <span style="color: red">Đơn hàng đã bị huỷ</span>
                                        @elseif($hd->status == -2)
                                            <span style="color: red">Giao hàng không thành công</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($hd->status ==0)
                                            <a href="{{ route('pages.getHuy', ['id' => $hd->id]) }}" class="btn btn-danger">Huỷ đơn hàng</a>
                                        @else
                                            <span>Không thể huỷ đơn hàng</span>
                                        @endif
                                    </td>
                                    </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="space90">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection

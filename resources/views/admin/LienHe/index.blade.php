@extends('admin.layouts.layout')

@section('head')
    <title>Lời nhắn khách hàng</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách lời nhắn</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Danh sách lời nhắn</div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($thongtin))
                                @php
                                    $i = 1;
                                @endphp
                                    @foreach ($thongtin as $item)

                                        <tr class="odd gradeX">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->ho_ten }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->dien_thoai }}</td>
                                            <td>{{ $item->noi_dung }}</td>
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

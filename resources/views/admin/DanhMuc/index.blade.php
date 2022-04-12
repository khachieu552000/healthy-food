@extends('admin.layouts.layout')

@section('head')
    <title>Danh Mục</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục</h1>
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
        <div class="alert alert-success">{{ session('thongbao') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <p>
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-add"> <i class="fa fa-plus"></i>
                    Thêm danh mục</a>
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
                                    <th>Tên danh mục</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($danhmuc))
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($danhmuc as $item)

                                        <tr class="odd gradeX">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->ten_danh_muc }}</td>
                                            <td>
                                                <a class="btn btn-success btn-xs btn-edit" href="#"
                                                    data-url="{{ route('Danhmuc.getSua', ['id' => $item->id]) }}"
                                                    ​><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.DanhMuc.getXoa', ['id'=>$item->id]) }}"
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
    @include('admin.DanhMuc.modal_add')
    @include('admin.DanhMuc.modal_edit')

@endsection

@section('script')

    <script>
        $('.btn-edit').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-edit').modal('show');
            e.preventDefault();
            $.ajax({
                //phương thức get
                type: 'get',
                url: url,
                success: function(response) {
                    //đưa dữ liệu controller gửi về điền vào input trong form edit.
                    $('#name-edit').val(response.data.ten_danh_muc);
                    $('#name-lsp').val(response.data.ten_danh_muc);
                    //thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
                    $('#form-edit').attr('action', '{{ asset('admin/danh-muc/sua/') }}/' +
                        response.data
                        .id)
                },
                error: function(error) {

                }
            })
        })
    </script>

@endsection

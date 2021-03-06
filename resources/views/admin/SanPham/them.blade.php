@extends('admin.layouts.layout')
@section('head')
    <title>Thêm sản phẩm</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nhập sản phẩm mới
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="them">
                                    <div class="form-group">
                                        <label for="danh_muc">Danh mục <span style="color: red">*</span></label>
                                        <select class="form-control" style="width: 30%" name="danh_muc"
                                            id="danh_muc" require>
                                            <option value="" disabled selected>--- Danh mục ---</option>
                                            @if (isset($danhmuc))
                                                @foreach ($danhmuc as $muc)
                                                    <option value="{{ $muc->id }}">{{ $muc->ten_danh_muc }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ten_san_pham">Tên sản phẩm <span style="color: red">*</span></label>
                                        <input class="form-control" id="ten_san_pham" name="ten_san_pham"
                                            placeholder="Nhập tên sản phẩm..." value="{{ old('ten_san_pham') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="so_luong">Số lượng <span style="color: red">*</span></label>
                                        <input type="number" style="width: 30%" class="form-control" id="so_luong"
                                            name="so_luong" placeholder="Nhập giá sản phẩm" value="0" value="{{ old('so_luong') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_ban">Giá bán (VNĐ) <span style="color: red">*</span></label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_ban"
                                            name="don_gia_ban" placeholder="Nhập giá sản phẩm" value="0" value="{{ old('don_gia_ban') }}">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="hinh_anh">Hình ảnh sản phẩm <span style="color: red">*</span></label>
                                                <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh" value="{{ old('hinh_anh') }}">
                                            </div>
                                            <span>Xem trước: </span>
                                            <img id="blah" width="150px" height="150px" src="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="thuoc_tinh">Thuộc tính</label>
                                        <textarea class="form-control ckeditor" id="demo" name="thuoc_tinh" rows="5">{{ old('thuoc_tinh') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="mo_ta">Mô tả</label>
                                        <textarea class="form-control ckeditor" id="demo" name="mo_ta" rows="5">{{ old('mo_ta') }}</textarea>
                                    </div>
                                </div>
                                <a type="button" href="{{ route('admin.sanpham.index') }}" class="btn btn-success" value="quay lại">Quay lại</a>
                                <input type="submit" class="btn btn-primary mb-2" value="Lưu">
                                <input type="reset" class="btn btn-default" value="Nhập lại" id="nhap-lai">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#hinh_anh").change(function() {
            readURL(this);
        });
    </script>
@endsection

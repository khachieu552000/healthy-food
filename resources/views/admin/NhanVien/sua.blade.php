@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa nhân viên</h1>
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
    <div class="panel panel-default">
        <div class="panel-heading"> Sửa nhân viên</div>
        <div class="panel-body">
            <form action="{{ route('admin.nhanvien.postSua', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="ho_ten">Họ tên <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="ho_ten" placeholder="Họ và tên" name="ho_ten" value="{{ $user->nhan_vien->ho_ten }}" autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label for="email">Email <span style="color: red">*</span></label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $user->email }}" autocomplete="off" disabled />
                </div>

                <div class="form-group">
                    <label for="dien_thoai">Điện thoại <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="dien_thoai" placeholder="Số điện thoại" name="dien_thoai" value="{{ $user->nhan_vien->dien_thoai }}" autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="ngay_sinh">Ngày sinh <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ $user->nhan_vien->ngay_sinh }}" autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="gioi_tinh">Giới tính <span style="color: red">*</span></label>
                    <select class="form-control" name="gioi_tinh" id="gioi_tinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ" @if ($user->nhan_vien->gioi_tinh == "Nữ")
                            selected
                        @endif>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dia_chi">Địa chỉ <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ $user->nhan_vien->dia_chi }}" placeholder="Địa chỉ" />
                </div>
                <a type="button" href="{{ route('admin.nhanvien.index') }}" class="btn btn-success" value="quay lại">Quay lại</a>
                <button type="submit" class="btn btn-primary mb-2">Lưu</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Đặt lại mật khẩu
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.nhanvien.getDatMatkhau', ['id'=>$user->id]) }}" method="get">
                @csrf
                <label for="exampleFormControlInput1">Đặt lại mật khẩu về mặc định là: 123456</label>
                <br>
                <button type="submit" class="btn btn-primary mb-2" onclick="return ConfirmResetPass()">Đặt lại mật khẩu</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Xác nhận mật khẩu không đúng!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>

@endsection

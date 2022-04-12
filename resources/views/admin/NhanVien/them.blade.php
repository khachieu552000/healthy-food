@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm nhân viên</h1>
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
        <div class="panel-heading"> Thêm nhân viên</div>
        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="ho_ten">Họ tên</label>
                    <input type="text" class="form-control" id="ho_ten" placeholder="Họ và tên" name="ho_ten" autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off" />
                </div>

                <div class="form-group">
                    <label for="dien_thoai">Điện thoại</label>
                    <input type="text" class="form-control" id="dien_thoai" placeholder="Số điện thoại" name="dien_thoai" autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="ngay_sinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="gioi_tinh">Giới tính</label>
                    <select class="form-control" name="gioi_tinh" id="gioi_tinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dia_chi">Địa chỉ</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value=""
                        placeholder="Địa chỉ" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password" required autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Xác nhận mật khẩu" name="passwordAgain" required>
                </div>


                <button type="submit" class="btn btn-primary mb-2">Thêm</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
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

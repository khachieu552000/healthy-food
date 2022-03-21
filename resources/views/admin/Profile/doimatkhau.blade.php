@extends('admin.layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Đổi mật khẩu</h1>
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
@if (session('baoloi'))
    <div class="alert alert-danger">
        {{ session('baoloi') }}
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        Đặt lại mật khẩu
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            @csrf
              <div class="form-group">
                  <label for="oldPassword">Mật khẩu cũ</label>
                  <input type="password" class="form-control" id="oldPassword" name="oldPassword">
              </div>
              <div class="form-group">
                  <label for="password">Mật khẩu mới</label>
                  <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="confirmPassword">Xác nhận mật khẩu mới</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            </div>
              <button type="submit" class="btn btn-primary">Thay đổi</button>
          </form>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirmPassword");

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

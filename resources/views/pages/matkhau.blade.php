@extends('pages.layouts.layout')
@section('title')
    <title>Đổi mật khẩu</title>
@endsection
@section('content')

<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.getMatkhauUser') }}">Đổi mật khẩu</a>
    <div class="clearfix"></div>
</div>
<div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đổi mật khẩu</h1>
            </div>
        </div>
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <button class="close" type="button" data-dismiss= "alert" aria-label="close" aria-hidden="true">&times;</button>
        @foreach ($errors->all() as $err)
        {{ $err }}
        @endforeach
    </div>
    @endif
    @if (session('loi'))
    <div class="alert alert-danger">
        <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
        {{ session('loi') }}
    </div>
    @endif
    @if (session('thongbao'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</button>
        {{ session('thongbao') }}
    </div>
    @endif
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('pages.postMatkhauUser') }}" method="POST">
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
        </div>
    </div>
</div>
<div class="space90">&nbsp;</div>
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

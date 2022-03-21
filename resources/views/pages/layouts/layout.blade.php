<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/logo.jpg') }}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('front-end/assets/dest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('front-end/assets/dest/rs-plugin/css/settings.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('front-end/assets/dest/rs-plugin/css/responsive.css') }}"> --}}
	<link rel="stylesheet" title="style" href="{{ asset('front-end/assets/dest/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('front-end/assets/dest/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/dest/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/siiimple-toast/dist/style.css" rel="stylesheet">
    @yield('title')
</head>
<body id="cart">

    @include('pages.layouts.header')
    @yield('content')
    @include('pages.layouts.footer')

    <div id="backtop">
            <i class="fa fa-chevron-up"></i>
    </div>


	<!-- include js files -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	{{-- <script src="{{ asset('front-end/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('front-end/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('front-end/assets/dest/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('front-end/assets/dest/js/wow.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/siiimple-toast/dist/siiimple-toast.min.js"></script>
	<script>
	$(document).ready(function($) {
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
    <script>
        $(document).ready(function($){
            $(window).scroll(function(){
                if ($(this).scrollTop()) {
                    $("#backtop").fadeIn()
                } else{
                    $("#backtop").fadeOut()
                }
            });
            $("#backtop").click(function(){
                $('html, body').animate({
                    scrollTop: 0
                }, 1000);
            });
        });
    </script>

    <script>
        function deleteCart(id){
            $.ajax({
                url: '/nguoi-dung/xoa/' +id,
                type: 'GET',
            }).done(function(response){
                $("#cart").empty();
                $("#cart").html(response);
                siiimpleToast.success('Đã xoá sản phẩm khỏi giỏ hàng !');
            })
        }

        function addCart(id){
            $.ajax({
                url: '/nguoi-dung/them/' +id,
                type: 'GET',
            }).done(function(response){
                $("#cart").empty();
                $("#cart").html(response);
                siiimpleToast.success('Sản phẩm đã được thêm vào giỏ hàng !')
            })
        }

                function updateItemCart(id) {
            var value = $("#select-" + id).val();
            $.ajax({
                url: '/nguoi-dung/sua/' + id + '/' + value,
                type: 'GET',
            }).done(function(response) {
                $("#cart").empty();
                $("#cart").html(response);
                siiimpleToast.success('Cập nhật giỏ hàng thành công!');
            })
        }
    </script>

</body>
</html>

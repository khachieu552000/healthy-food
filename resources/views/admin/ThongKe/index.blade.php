@extends('admin.layouts.layout')
@section('head')
    <title>Thống Kê</title>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thống kê</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">Thống kê doanh thu theo tháng</div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var month = <?php echo $month; ?>;
    var hoadon = <?php echo $hoadon; ?>;
    var barChartData = {
        labels: month,
        datasets: [{
            label: 'Tổng doanh thu',
            backgroundColor: "pink",
            data: hoadon
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Tổng tiền hoá đơn(Theo tháng)'
                }
            }
        });
    };
</script>
@endsection

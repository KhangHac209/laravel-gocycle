@extends('admin.layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <h1>DashBoard</h1>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $productCount }}</h3>
                                <p>Total Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $productCategryCount }}</h3>
                                <p>Total Products Category</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $userCount }}</h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $orderCount }}</h3>
                                <p>Total Order</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="order-status" style="width: 900px; height: 500px;"></div>
                <div id="product-category" style="width: 900px; height: 500px;"></div>
            </div>
        </section>
    </div>
@endsection
@section('my-jquery')
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable(@json($data));

            var options = {
                title: 'Order Status Summary'
            };

            var chart = new google.visualization.PieChart(document.getElementById('order-status'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(@json($dataCategory));

            var options = {
                title: "Product Category",
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("product-category"));

            chart.draw(data, options);
        }
    </script>
@endsection

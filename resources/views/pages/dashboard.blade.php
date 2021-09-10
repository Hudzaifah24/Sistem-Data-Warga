@extends('Layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-info elevation-1"
                        ><i class="fas fa-users"></i
                    ></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk</span>
                        <span class="info-box-number">{{ number_format($penduduk) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-warning elevation-1"
                        ><i class="fab fa-accessible-icon"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kepala Kelarga</span>
                        <span class="info-box-number">{{ number_format($kepalaKeluarga) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"
                        ><i class="fas fa-users"></i
                    ></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Warga Kematian</span>
                        <span class="info-box-number">{{ number_format($totalWargaKematian) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-primary elevation-1"
                        ><i class="fas fa-baby-carriage"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Warga Kelahiran</span>
                        <span class="info-box-number">{{ number_format($totalWargaKelahiran) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"
                        ><i class="nav-icon fab fa-accusoft"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Dusun</span>
                        <span class="info-box-number">{{ number_format($totalDusun) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-info elevation-1"
                        ><i class="nav-icon fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">User</span>
                        <span class="info-box-number">{{number_format($user)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-primary elevation-1"
                        ><i class="nav-icon fas fa-suitcase-rolling"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk Pindah</span>
                        <span class="info-box-number">{{$totalPendudukPindah}}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-warning elevation-1"
                        ><i class="nav-icon fa fa-user-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk Datang</span>
                        <span class="info-box-number">{{ number_format($TotalPendudukDatang) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Total Penduduk</h5>

                        <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                        >
                            <i class="fas fa-minus"></i>
                        </button>
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="remove"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                            <strong>Total Penduduk: 3-9-2021 - {{$month}}</strong>
                            </p>

                            <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas
                                id="salesChart"
                                height="180"
                                style="height: 180px"
                            ></canvas>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Info Penduduk</strong>
                            </p>

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Penduduk Menikah</span>
                                <span class="float-right"><b>{{$menikah}}</b>/{{$penduduk}}</span>
                                <div class="progress progress-sm">
                                    <div
                                        class="progress-bar bg-success"
                                        @if ($menikah&&$penduduk)
                                            style="width: {{ (1 * 100) / ($penduduk / $menikah) . '%'}}"
                                        @endif
                                    ></div>
                                </div>
                            </div>

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                Penduduk Belum Menikah
                                <span class="float-right"><b>{{$belum_menikah}}</b>/{{$penduduk}}</span>
                                <div class="progress progress-sm">
                                    <div
                                        class="progress-bar bg-warning"
                                        @if ($belum_menikah&&$penduduk)
                                            style="width: {{ (1 * 100) / ($penduduk / $belum_menikah) . '%'}}"
                                        @endif
                                    ></div>
                                </div>
                            </div>

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                Penduduk Bercerai
                                <span class="float-right"><b>{{$bercerai}}</b>/{{$penduduk}}</span>
                                <div class="progress progress-sm">
                                    <div
                                        class="progress-bar bg-danger"
                                        @if ($bercerai&&$penduduk)
                                            style="width: {{ (1 * 100) / ($penduduk / $bercerai) . '%'}}"
                                        @endif
                                    ></div>
                                </div>
                            </div>


                            <!-- /.progress-group -->
                        </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                    <div class="border-transparent card-header">
                        <h3 class="card-title">Penduduk Baru</h3>

                        <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                        >
                            <i class="fas fa-minus"></i>
                        </button>
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="remove"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Nama Dusun</th>
                                <th>No NIK</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendudukBaru as $data)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>{{$data->nama}}</td>
                                        <td>
                                            {{$data->dusun}}
                                        </td>
                                        <td>
                                            {{$data->NIK}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-3 text-center">
                                            Data Kosong!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="clearfix card-footer">
                        {{-- <a
                            href="javascript:void(0)"
                            class="float-left btn btn-sm btn-info"
                            >Place New Order</a> --}}
                        <a
                            href="{{route('penduduk.index')}}"
                            class="float-right btn btn-sm btn-secondary"
                            >Lihat Semua Penduduk
                        </a>
                    </div>
                    <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Info Jenis Kelamin</h3>

                        <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                        >
                            <i class="fas fa-minus"></i>
                        </button>
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="remove"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="150"></canvas>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <ul class="clearfix chart-legend">
                                        <li>
                                            <i class="far fa-circle text-info"></i> Pria
                                        </li>
                                        <li>
                                            <i class="far fa-circle text-warning"></i> Wanita
                                        </li>
                                        <li>
                                            <i class="far fa-circle text-danger"></i> Privasi
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script-sesudah')
    {{-- <script>
        window.addEventListener("load", window.print());
    </script> --}}
    <script>
        /* global Chart:false */

        $(function () {
        "use strict";

        /* ChartJS
        * -------
        * Here we will create a few charts using ChartJS
        */

        //-----------------------
        // - MONTHLY SALES CHART -
        //-----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");

        var salesChartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
            {
                label: "Digital Goods",
                backgroundColor: "rgba(60,141,188,0.9)",
                borderColor: "rgba(60,141,188,0.8)",
                pointRadius: false,
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [{{$Jan}}, {{$Feb}},{{$Mar}},{{$Apr}},{{$May}},{{$Jun}},{{$Jul}},{{$Aug}},{{$Sep}},{{$Oct}},{{$Nov}},{{$Dec}}],
            },
            {
                label: "Electronics",
                backgroundColor: "rgba(210, 214, 222, 1)",
                borderColor: "rgba(210, 214, 222, 1)",
                pointRadius: false,
                pointColor: "rgba(210, 214, 222, 1)",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [{{$Jan}}, {{$Feb}},{{$Mar}},{{$Apr}},{{$May}},{{$Jun}},{{$Jul}},{{$Aug}},{{$Sep}},{{$Oct}},{{$Nov}},{{$Dec}}],
            },
            ],
        };

        var salesChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
                },
            scales: {
                xAxes: [
                    {
                        gridLines: {
                            display: true,
                        },
                    },
                ],
                yAxes: [
                    {
                        gridLines: {
                            display: false,
                        },
                    },
                ],
            },
        };

        // This will get the first returned node in the jQuery collection.
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart(salesChartCanvas, {
            type: "line",
            data: salesChartData,
            options: salesChartOptions,
        });

        //---------------------------
        // - END MONTHLY SALES CHART -
        //---------------------------

        //-------------
        // - PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieData = {
            labels: ["Pria", "Wanita", "Upnormal"],
            datasets: [
            {
                data: [{{$laki}}, {{$wanita}}, {{$upnormal}}],
                backgroundColor: ["#4B94BF", "#FFC107", "#E74C3C", ],
            },
            ],
        };
        var pieOptions = {
            legend: {
            display: false,
            },
        };
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChart = new Chart(pieChartCanvas, {
            type: "doughnut",
            data: pieData,
            options: pieOptions,
        });

        //-----------------
        // - END PIE CHART -
        //-----------------

        /* jVector Maps
        * ------------
        * Create a world map with markers
        */
        $("#world-map-markers").mapael({
            map: {
                name: "usa_states",
                zoom: {
                    enabled: true,
                    maxLevel: 10,
                    },
                },
            });
        });

    </script>
@endpush

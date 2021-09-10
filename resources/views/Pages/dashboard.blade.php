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
                    <span class="info-box-icon bg-warning elevation-1"
                        ><i class="fas fa-users"></i
                    ></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Penduduk</span>
                        <span class="info-box-number">{{ number_format($penduduk) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"
                        ><i class="far fa-credit-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Kepala Kelarga</span>
                        <span class="info-box-number">{{ number_format($kk) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-warning elevation-1"
                        ><i class="fas fa-users"></i
                    ></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Warga Kematian</span>
                        <span class="info-box-number">{{ number_format($penduduk) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"
                        ><i class="far fa-credit-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Warga Kelahiran</span>
                        <span class="info-box-number">{{ number_format($kk) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"
                        ><i class="nav-icon fas fa-address-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Dusun</span>
                        <span class="info-box-number">{{ number_format($ktp) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"
                        ><i class="nav-icon fas fa-address-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Surat Keluar</span>
                        <span class="info-box-number">{{ number_format($ktp) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"
                        ><i class="nav-icon fas fa-address-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Penduduk Pindah</span>
                        <span class="info-box-number">{{ number_format($ktp) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"
                        ><i class="nav-icon fas fa-address-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Penduduk Datang</span>
                        <span class="info-box-number">{{ number_format($ktp) }}</span>
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
                        <h5 class="card-title">Monthly Recap Report</h5>

                        <div class="card-tools">
                        <button
                            type="button"
                            class="btn btn-tool"
                            data-card-widget="collapse"
                        >
                            <i class="fas fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button
                            type="button"
                            class="btn btn-tool dropdown-toggle"
                            data-toggle="dropdown"
                            >
                            <i class="fas fa-wrench"></i>
                            </button>
                            <div
                            class="dropdown-menu dropdown-menu-right"
                            role="menu"
                            >
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item"
                                >Something else here</a
                            >
                            <a class="dropdown-divider"></a>
                            <a href="#" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
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
                            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
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
                                <strong>Goal Completion</strong>
                            </p>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                Send Inquiries
                                <span class="float-right"><b>250</b>/500</span>
                                <div class="progress progress-sm">
                                    <div
                                    class="progress-bar bg-warning"
                                    style="width: 50%"
                                    ></div>
                                </div>
                            </div>

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                Complete Purchase
                                <span class="float-right"><b>310</b>/400</span>
                                <div class="progress progress-sm">
                                    <div
                                    class="progress-bar bg-danger"
                                    style="width: 75%"
                                    ></div>
                                </div>
                            </div>

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Visit Premium Page</span>
                                <span class="float-right"><b>480</b>/800</span>
                                <div class="progress progress-sm">
                                    <div
                                    class="progress-bar bg-success"
                                    style="width: 60%"
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
                        <h3 class="card-title">Latest Orders</h3>

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
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Popularity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                <a href="pages/examples/invoice.html">OR9842</a>
                                </td>
                                <td>Call of Duty IV</td>
                                <td>
                                <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>
                                <div
                                    class="sparkbar"
                                    data-color="#00a65a"
                                    data-height="20"
                                >
                                    90,80,90,-70,61,-83,63
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="pages/examples/invoice.html">OR1848</a>
                                </td>
                                <td>Samsung Smart TV</td>
                                <td>
                                <span class="badge badge-warning">Pending</span>
                                </td>
                                <td>
                                <div
                                    class="sparkbar"
                                    data-color="#f39c12"
                                    data-height="20"
                                >
                                    90,80,-90,70,61,-83,68
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="pages/examples/invoice.html">OR7429</a>
                                </td>
                                <td>iPhone 6 Plus</td>
                                <td>
                                <span class="badge badge-danger">Delivered</span>
                                </td>
                                <td>
                                <div
                                    class="sparkbar"
                                    data-color="#f56954"
                                    data-height="20"
                                >
                                    90,-80,90,70,-61,83,63
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="pages/examples/invoice.html">OR7429</a>
                                </td>
                                <td>Samsung Smart TV</td>
                                <td>
                                <span class="badge badge-info">Processing</span>
                                </td>
                                <td>
                                <div
                                    class="sparkbar"
                                    data-color="#00c0ef"
                                    data-height="20"
                                >
                                    90,80,-90,70,-61,83,63
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="pages/examples/invoice.html">OR1848</a>
                                </td>
                                <td>Samsung Smart TV</td>
                                <td>
                                <span class="badge badge-warning">Pending</span>
                                </td>
                                <td>
                                <div
                                    class="sparkbar"
                                    data-color="#f39c12"
                                    data-height="20"
                                >
                                    90,80,-90,70,61,-83,68
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="pages/examples/invoice.html">OR7429</a>
                                </td>
                                <td>iPhone 6 Plus</td>
                                <td>
                                <span class="badge badge-danger">Delivered</span>
                                </td>
                                <td>
                                <div
                                    class="sparkbar"
                                    data-color="#f56954"
                                    data-height="20"
                                >
                                    90,-80,90,70,-61,83,63
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="pages/examples/invoice.html">OR9842</a>
                                </td>
                                <td>Call of Duty IV</td>
                                <td>
                                <span class="badge badge-success">Shipped</span>
                                </td>
                                <td>
                                <div
                                    class="sparkbar"
                                    data-color="#00a65a"
                                    data-height="20"
                                >
                                    90,80,90,-70,61,-83,63
                                </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="clearfix card-footer">
                        <a
                        href="javascript:void(0)"
                        class="float-left btn btn-sm btn-info"
                        >Place New Order</a
                        >
                        <a
                        href="javascript:void(0)"
                        class="float-right btn btn-sm btn-secondary"
                        >View All Orders</a
                        >
                    </div>
                    <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Browser Usage</h3>

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
                                <i class="far fa-circle text-success"></i>Pria
                            </li>
                            <li>
                                <i class="far fa-circle text-info"></i> Wanita
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

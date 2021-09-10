@extends('Layouts.dashboard')

@section('title', 'KK')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>KK</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">KK</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="pb-0 card-body">
                <div class="row">
                    @foreach ($data as $kk)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                Kartu Keluarga (KK)
                                </div>
                                <div class="pt-0 card-body">
                                    <div class="row">
                                        <div class="col-12">
                                        {{-- <h2 class="lead"><b></b></h2> --}}
                                        <p class="text-sm text-muted"><b>NO: {{ $kk->no_kk }}</b>  </p>
                                            <ul class="mb-0 ml-1 fa-ul text-muted">
                                                <li class="mb-1 small"><span class="fa-li"></span>
                                                    Kepala Keluarga: {{ $kk->nama_ayah }}
                                                </li>
                                                <li class="small"><span class="fa-li"></span> Alamat: {{ $kk->alamat }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        {{-- <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a> --}}
                                        <a href="{{ route('kartukeluarga.show', $kk->id.'/'.$kk->no_kk) }}" class="btn btn-sm btn-primary">
                                            <i class="nav-icon fas fa-address-card"></i>
                                            View KK
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            {{-- < class="card-footer">
                <nav aria-label="KTP Page Navigation">
                    <ul class="m-0 pagination justify-content-center">
                        <li class="page-item active"><a class="page-link" href="">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                    </ul>
                </nav>
            --}}

            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

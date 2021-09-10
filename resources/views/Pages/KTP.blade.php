@extends('Layouts.dashboard')

@section('title', 'KTP')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>KTP</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">KTP</li>
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
                    @foreach ($ktp as $k)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Kartu Tanda Penduduk (KTP)
                                </div>
                                <div class="pt-0 card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $k->nama }}</b></h2>
                                            <p class="text-sm text-muted"><b>NIK: </b> {{ $k->NIK }} </p>
                                            <ul class="mb-0 ml-4 fa-ul text-muted">
                                                <li class="mb-2 small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: {{ $k->alamat }}</li>
                                                {{-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li> --}}
                                            </ul>
                                        </div>
                                        <div class="text-center col-5">
                                            <img src="{{ asset('photos/'.$k->photo) }}" alt="user-avatar" style="height: 110px; width: 110px" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="">
                                        {{-- <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                        </a> --}}
                                        <a href="{{ route('ktp.show', $k->id) }}" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#exampleModalCenter-{{ $k->id }}" class="text-light" data-toggle="tooltip" data-placement="top" title="KTP">
                                            <i class="nav-icon fas fa-address-card"></i>
                                            View KTP
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter-{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Kartu Tanda Penduduk (KTP)</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12 d-flex align-items-stretch flex-column">
                                                            <div class="p-4 card bg-light d-flex flex-fill">
                                                                <div class="text-center card-header border-bottom-0">
                                                                    <h2 class="text-bold m-none">{{$k->provinsi}} <br> {{$k->kota}} </h2>
                                                                </div>
                                                                <div class="pt-0 card-body">
                                                                    <div class="row">
                                                                        <div class="col-7">
                                                                            <h2 class="mb-3"><b>NIK :
                                                                                <b class="text-uppercase">{{ $k->NIK }}</b>
                                                                            </b>
                                                                            </h2>
                                                                            <h5 class="text-sm "><b>Nama :
                                                                                <b class="text-uppercase">{{ $k->nama }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="text-sm "><b>Tempat/Tgl Lahir :
                                                                                <b class="text-uppercase">{{ $k->tempat_lahir }}, {{$k->tanggal_lahir}}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <div class="text-sm row" style="margin-left: 1px">
                                                                                <h5 class="mr-3 text-sm"><b>Jenis Kelamin :
                                                                                    <b class="text-uppercase">{{ $k->jenis_kelamin }}</b>
                                                                                </b>
                                                                                </h5>
                                                                                <h5 class="text-sm"><b>Gol. Darah :

                                                                                    <b class="text-uppercase">{{ $k->gol_darah }}</b>
                                                                                </b>
                                                                                </h5>
                                                                            </div>
                                                                            <h5 class="text-sm "><b>Alamat :

                                                                                <b class="text-uppercase">{{ $k->alamat }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="ml-3 text-sm"><b>RT/RW :

                                                                                <b class="text-uppercase">{{ $k->rt->RT }}</b> / <b class="text-uppercase">{{ $k->rt->RW }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="ml-3 text-sm"><b>Kel/Desa :

                                                                                <b class="text-uppercase">{{ $k->desa->desa }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="ml-3 text-sm"><b>Kecamatan :

                                                                                <b class="text-uppercase">{{ $k->kecamatan }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="text-sm"><b>Agama :

                                                                                <b class="text-uppercase">{{ $k->agama }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            @if ($k->status_perkawinan=='KAWIN')
                                                                                <h5 class="text-sm"><b>Status Perkawinan : </b> <b class="text-uppercase">KAWIN</b> </h5>
                                                                            @elseif ($k->status_perkawinan=='BELOM_KAWIN')
                                                                                <h5 class="text-sm"><b>Status Perkawinan : </b> <b class="text-uppercase">BELUM KAWIN</b> </h5>
                                                                            @elseif ($k->status_perkawinan=='BERCERAI')
                                                                                <h5 class="text-sm"><b>Status Perkawinan : </b> <b class="text-uppercase">BERCERAI</b> </h5>
                                                                            @endif
                                                                            <h5 class="text-sm"><b>Pekerjaan :

                                                                                <b class="text-uppercase">{{ $k->pekerjaan }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="text-sm"><b>Kewarganegaraan :

                                                                                <b class="text-uppercase">{{ $k->kewarganegaraan }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="text-sm"><b>Berlaku Hingga :

                                                                                <b class="text-uppercase">{{ $k->berlaku }}</b>
                                                                            </b>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="text-center col-5">
                                                                            <img src="{{ asset('photos/'.$k->photo) }}" alt="user-avatar" style="height: 230px; width: 190px" class="mt-3 img-fluid">
                                                                            <h5 class="mt-1 text-lg ">
                                                                                <b class="text-uppercase d-block">{{ $k->alamat }}</b><b>{{ $k->created_at }}</b>
                                                                            </h5>
                                                                            <h5 class="text-md">
                                                                                <b><b class="text-uppercase"></b></b>
                                                                            </h5>
                                                                            <img src="{{ asset('ttd/'.$k->TTD) }}" alt="Tanda Tangan" style="height: 60px; width: 150px; margin-top: -10px" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="card-footer">
                                                                    <div class="text-right">
                                                                        <a href="#" class="btn btn-sm bg-teal">
                                                                            <i class="fas fa-comments"></i>
                                                                        </a>
                                                                        <a href="{{ route('ktp.show', $k->id) }}" class="btn btn-sm btn-primary">
                                                                            <i class="nav-icon fas fa-address-card"></i> View KTP
                                                                        </a>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Print</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer">
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
            </div> --}}
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@extends('Layouts.dashboard')

@section('title', 'Data Warga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Data Warga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Data Warga</li>
                    </ol>
                </div>
            </div>

            <!-- Import Excel -->
            <button type="button" class="mr-2 btn btn-primary" data-toggle="modal" data-target="#importExcel">
                IMPORT EXCEL
            </button>
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('import.penduduk') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">

                                @csrf
                                @method('POST')

                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{ route('export.penduduk') }}" class="my-3 mr-2 btn btn-success" target="_blank">EXPORT EXCEL</a>
            <a href="{{ route('warga.create') }}" class="my-3 btn btn-info">TAMBAH DATA</a>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Warga</h3>

                <div class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                        title="Collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="remove"
                        title="Remove"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @if (session()->has('edit'))
                <div class="alert alert-primary" role="alert">
                    {{session()->get('edit')}}
                </div>
            @endif
            @if (session()->has('add'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('add')}}
                </div>
            @endif
            @if (session()->has('delete'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('delete') }}
                </div>
            @endif
            <div class="p-0 card-body">
                <table class="table table-striped Data Warga">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th >Nama</th>
                            <th style="width: 20%">Desa</th>
                            <th class="">Jenis Kelamin</th>
                            <th class="text-center">Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penduduk as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" data-toggle="modal" data-target="#exampleModalCenter-{{ $data->id }}" class="text-light" data-toggle="tooltip" data-placement="top" title="KTP">{{ $data->nama }}</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                <h2 class="text-bold m-none">{{$data->provinsi}} <br> {{$data->kota}} </h2>
                                                            </div>
                                                            <div class="pt-0 card-body">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <h2 class="mb-3"><b>NIK :
                                                                            <b class="text-uppercase">{{ $data->NIK }}</b>
                                                                        </b>
                                                                        </h2>
                                                                        <h5 class="text-sm "><b>Nama :
                                                                            <b class="text-uppercase">{{ $data->nama }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <h5 class="text-sm "><b>Tempat/Tgl Lahir :
                                                                            <b class="text-uppercase">{{ $data->tempat_lahir }}, {{$data->tanggal_lahir}}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <div class="text-sm row" style="margin-left: 1px">
                                                                            <h5 class="mr-3 text-sm"><b>Jenis Kelamin :
                                                                                <b class="text-uppercase">{{ $data->jenis_kelamin }}</b>
                                                                            </b>
                                                                            </h5>
                                                                            <h5 class="text-sm"><b>Gol. Darah :

                                                                                <b class="text-uppercase">{{ $data->gol_darah }}</b>
                                                                            </b>
                                                                             </h5>
                                                                        </div>
                                                                        <h5 class="text-sm "><b>Alamat :

                                                                            <b class="text-uppercase">{{ $data->alamat }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <h5 class="ml-3 text-sm"><b>RT/RW :

                                                                            <b class="text-uppercase">{{ $data->rt->RT }}</b> / <b class="text-uppercase">{{ $data->rt->RW }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <h5 class="ml-3 text-sm"><b>Kel/Desa :

                                                                            <b class="text-uppercase">{{ $data->desa->desa }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <h5 class="ml-3 text-sm"><b>Kecamatan :

                                                                            <b class="text-uppercase">{{ $data->kecamatan }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <h5 class="text-sm"><b>Agama :

                                                                            <b class="text-uppercase">{{ $data->agama }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        @if ($data->status_perkawinan=='KAWIN')
                                                                            <h5 class="text-sm"><b>Status Perkawinan : </b> <b class="text-uppercase">KAWIN</b> </h5>
                                                                        @elseif ($data->status_perkawinan=='BELOM_KAWIN')
                                                                            <h5 class="text-sm"><b>Status Perkawinan : </b> <b class="text-uppercase">BELUM KAWIN</b> </h5>
                                                                        @elseif ($data->status_perkawinan=='BERCERAI')
                                                                            <h5 class="text-sm"><b>Status Perkawinan : </b> <b class="text-uppercase">BERCERAI</b> </h5>
                                                                        @endif
                                                                        <h5 class="text-sm"><b>Pekerjaan :

                                                                            <b class="text-uppercase">{{ $data->pekerjaan }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <h5 class="text-sm"><b>Kewarganegaraan :

                                                                            <b class="text-uppercase">{{ $data->kewarganegaraan }}</b>
                                                                        </b>
                                                                        </h5>
                                                                        <h5 class="text-sm"><b>Berlaku Hingga :

                                                                            <b class="text-uppercase">{{ $data->berlaku }}</b>
                                                                        </b>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="text-center col-5">
                                                                        <img src="{{ asset('photos/'.$data->photo) }}" alt="user-avatar" style="height: 230px; width: 190px" class="mt-3 img-fluid">
                                                                        <h5 class="mt-1 text-lg ">
                                                                            <b class="text-uppercase d-block">{{ $data->alamat }}</b><b>{{ $data->created_at }}</b>
                                                                        </h5>
                                                                        <h5 class="text-md">
                                                                            <b><b class="text-uppercase"></b></b>
                                                                        </h5>
                                                                        <img src="{{ asset('ttd/'.$data->TTD) }}" alt="Tanda Tangan" style="height: 60px; width: 150px; margin-top: -10px" class="img-fluid">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="card-footer">
                                                                <div class="text-right">
                                                                    <a href="#" class="btn btn-sm bg-teal">
                                                                        <i class="fas fa-comments"></i>
                                                                    </a>
                                                                    <a href="{{ route('ktp.show', $data->id) }}" class="btn btn-sm btn-primary">
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
                                    <small> Created {{ $data->created_at }} </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                        {{ $data->desa->desa }}
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                        {{ $data->jenis_kelamin }}
                                        </li>
                                    </ul>
                                </td>
                                <td class="text-center project-state">
                                @if ($data->status_perkawinan=='KAWIN')
                                    <span class="badge badge-success">
                                    Menikah
                                @elseif ($data->status_perkawinan=='BELOM_KAWIN')
                                    <span class="badge badge-warning">
                                    Belom Menikah
                                @elseif ($data->status_perkawinan=='BERCERAI')
                                    <span class="badge badge-danger">
                                    Bercerai
                                @endif
                                    </span>
                                </td>
                                <td class="text-right project-actions">
                                    <a class="btn btn-primary btn-sm" href="{{ route('warga.show', $data->id) }}">
                                        <i class="fas fa-folder"> </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('warga.edit', $data->id) }}">
                                        <i class="fas fa-pencil-alt"> </i>
                                        Edit
                                    </a>
                                    <form action="{{ route('warga.destroy', $data->id) }}" method="POST" class="">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"> </i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5" class="p-4 text-center">
                                Data Kosong!
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection

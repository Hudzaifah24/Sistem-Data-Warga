@extends('Layouts.dashboard')

@section('title', 'Data Penduduk')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Data Penduduk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Data Penduduk</li>
                    </ol>
                </div>
            </div>
            <a href="{{route('print.penduduk')}}" target="blank" class="mr-2 btn btn-primary">
                <i class="fa fa-print" aria-hidden="true"></i>
                Print
            </a>
            @if (Auth::user()->role!='WATCHER')
                <!-- Import Excel -->
                <button type="button" class="mr-2 btn btn-primary" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{route('import.penduduk')}}" method="POST" enctype="multipart/form-data">
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
                                    <span class="text-muted">Saya Menyarankan Agar Mendownload Templatenya Terlebih Dahulu...</span>
                                    <a href="{{route('template.penduduk')}}">Download Template... <i class="fa fa-download" aria-hidden="true"></i></a>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ route('penduduk.create') }}" class="my-3 mr-2 btn btn-info">TAMBAH DATA</a>
            @endif
                <a href="{{ route('export.penduduk') }}" class="my-3 btn btn-success" target="_blank">EXPORT EXCEL</a>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Penduduk</h3>

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
            <div class="card-header">
                <form action="{{route('search.penduduk')}}" method="GET" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex col-md-8">
                        <div class="mr-2">
                            <input name="nama" type="text" id="inputName" class="form-control" placeholder="search Nama" />
                        </div>
                        <span class="mr-2 d-flex align-items-center">
                            Or
                        </span>
                        <div class="mr-2">
                            <input name="nik" type="number" id="inputName" class="form-control" placeholder="search Nik" />
                        </div>
                        <button type="submit" class="btn btn-primary d-inline">
                            <i class="mr-1 fas fa-search"></i>
                            Search
                        </button>
                    </div>
                    <div class="">
                        <button type="button" class="mr-2 btn btn-primary d-inline" data-toggle="modal" data-target="#filter">
                            <i class="mr-1 fas fa-filter"></i>
                            Filter
                        </button>
                        <a href="{{route('penduduk.index')}}" class="btn btn-primary d-inline">
                            <i class="mr-1 fas fa-folder-open"></i>
                            All
                        </a>
                    </div>
                </form>
                <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <form action="{{route('filter.penduduk')}}" method="GET">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div>
                                      <div class="form-group row">
                                          <div class="text-center col-md-12">
                                            <label for="recipient-name" class="col-form-label">Dusun:</label>
                                            <select name="dusun" size="1" id="filter" class="form-control">
                                                @foreach ($filter as $data)
                                                    <option value="{{$data->dusun}}">{{$data->dusun}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Filter</button>
                              </div>
                        </form>
                      </div>
                    </div>
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
            <div class="p-0 card-body" style="">
                <table class="table table-striped projects" >
                    <thead>
                        <tr>
                            <th scope="col" class="text-left">#</th>
                            <th scope="col" class="text-left">NIK</th>
                            <th scope="col" class="">Nama</th>
                            <th scope="col" class="">Umur</th>
                            <th scope="col" class="text-center" >Nama Dusun</th>
                            <th scope="col" class="text-right" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penduduk as $data)
                            <tr>
                                {{-- <td class="text-left">{{ $loop->iteration }}</td> --}}
                                <td class="text-left">{{ $data->id }}</td>
                                <td class="text-left">
                                    @if ($data->NIK)
                                        {{$data->NIK}}
                                    @else
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#nik{{$data->id}}">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Isi NIK
                                        </a>
                                        <!-- Modal -->
                                        <div class="text-left modal fade" id="nik{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <form action="{{route('nik.value', $data->id)}}" method="POST" class="modal-content">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Isi NIK Penduduk</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="valueNik">NIK Penduduk</label>
                                                            <input type="number" name="NIK" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Add NIK</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td class="">{{$data->nama}}</td>
                                @php
                                    $now = date('Y');
                                    $lahir = date_create($data->tanggal_lahir);
                                    $date = date_format($lahir, 'Y');
                                    $umur = $now - $date;
                                @endphp
                                <td class="">{{$umur. ' Tahun'}}</td>
                                <td class="text-center">{{$data->dusun}}</td>
                                <td class="text-right"class="text-right project-actions">
                                    @if ($data->kematian==0)
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail{{$data->id}}">
                                            <i class="fas fa-folder"> </i>
                                            View
                                        </a>
                                        <!-- Modal -->
                                        <div class="text-left modal fade" id="detail{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Detail Penduduk</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered table-dark">
                                                            <tr>
                                                                <th scope="col">
                                                                    NIK
                                                                </th>
                                                                <td scope="col">
                                                                    @if ($data->NIK)
                                                                        {{$data->NIK}}
                                                                    @else
                                                                        <form action="{{route('nik.value', $data->id)}}" method="POST" class="modal-content">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="inputStatus">NIK</label>
                                                                                    <div class="d-flex">
                                                                                        <input type="number" name="NIK" class="mr-2 form-control">
                                                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Nama
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->nama}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Umur
                                                                </th>
                                                                <td scope="col">
                                                                    {{$umur.' Tahun'}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Tempat Lahir
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->tempat_lahir}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Tanggal Lahir
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->tanggal_lahir}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Jenis Kelamin
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->jenis_kelamin}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Nama Dusun
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->dusun}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    RT / RW
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->RT}} /
                                                                    {{$data->RW}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Kelurahan
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->kelurahan}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Kecamatan
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->kecamatan}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Agama
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->agama}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Status
                                                                </th>
                                                                <td scope="col">
                                                                    @if ($data->status)
                                                                        {{$data->status}}
                                                                    @else
                                                                        <form action="{{route('status.value', $data->id)}}" method="POST" class="modal-content">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="inputStatus">Status</label>
                                                                                    <div class="d-flex">
                                                                                        <select name="status" id="inputStatus" class="mr-2 form-control custom-select">
                                                                                            <option selected disabled>Select one</option>
                                                                                            <option value="MENIKAH">Menikah</option>
                                                                                            <option value="BELUM_MENIKAH">Belum Menikah</option>
                                                                                            <option value="BERCERAI">Bercerai</option>
                                                                                        </select>
                                                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Kepala Keluarga
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->kepala_keluarga==1?'Ya':'Tidak'}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    Pekerjaan
                                                                </th>
                                                                <td scope="col">
                                                                    @if ($data->pekerjaan)
                                                                        {{$data->pekerjaan}}
                                                                    @else
                                                                        <form action="{{route('pekerjaan.value', $data->id)}}" method="POST" class="modal-content">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="inputStatus">Pekerjaan</label>
                                                                                    <div class="d-flex">
                                                                                        <input type="text" name="pekerjaan" class="mr-2 form-control">
                                                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">
                                                                    kewarganegaraan
                                                                </th>
                                                                <td scope="col">
                                                                    {{$data->kewarganegaraan}}
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Print</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (Auth::user()->role!='WATCHER')
                                            <a class="btn btn-info btn-sm" href="{{route('penduduk.edit', $data->id)}}">
                                                <i class="fas fa-pencil-alt"> </i>
                                                Edit
                                            </a>
                                            <form action="{{route('penduduk.destroy', $data->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"> </i>
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <a href="{{url('search/kematian?NIK='. $data->NIK)}}">
                                            <div class="badge badge-danger">Meniggal</div>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center"colspan="5" class="py-3 text-center">
                                    Data Kosong!
                                </td>
                            </tr>
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

{{-- @push('script-sesudah')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endpush --}}

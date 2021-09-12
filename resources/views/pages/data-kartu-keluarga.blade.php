@extends('Layouts.dashboard')

@section('title', 'Kartu Keluarga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Kartu Keluarga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Kartu Keluarga</li>
                    </ol>
                </div>
            </div>
            <a href="{{route('print.kartu.keluarga')}}" target="blank" class="mr-2 btn btn-primary">
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
                        <form action="{{route('import.kartukeluarga')}}" method="POST" enctype="multipart/form-data">
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
                                    <a href="{{route('template.kartukeluarga')}}">Download Template... <i class="fa fa-download" aria-hidden="true"></i></a>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ route('kartukeluarga.create') }}" class="my-3 mr-2 btn btn-info">TAMBAH DATA</a>
            @endif
                <a href="{{ route('export.kartuKeluarga') }}" class="my-3 btn btn-success" target="_blank">EXPORT EXCEL</a>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Kartu Keluarga</h3>

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
                <form action="{{route('search.kartukeluarga')}}" method="GET" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex col-md-8">
                        <div class="mr-2">
                            <input name="no_kk" type="text" id="inputName" class="form-control" placeholder="search No kartu keluarga" />
                        </div>
                        <span class="mr-2 d-flex align-items-center">
                            Or
                        </span>
                        <div class="mr-2">
                            <input name="penduduk" type="text" id="inputName" class="form-control" placeholder="search Kepala Keluarga" />
                        </div>
                        <button type="submit" class=" btn btn-primary d-inline">
                            <i class="mr-1 fas fa-search"></i>
                            Search
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary d-inline" data-toggle="modal" data-target="#filter">
                            <i class="mr-1 fas fa-filter"></i>
                            Filter
                        </button>
                        <a href="{{route('kartukeluarga.index')}}" class="btn btn-primary d-inline">
                            <i class="mr-1 fas fa-folder-open"></i>
                            All
                        </a>
                    </div>
                </form>
                <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <form action="{{route('filter.kartukeluarga')}}" method="GET">
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
                                              <label for="recipient-name" class="col-form-label">Kepala Keluarga:</label>
                                              <select name="nama" size="1" id="filter" class="form-control">
                                                  @foreach ($filter as $data)
                                                    <option value="{{$data->nama}}">{{$data->nama}}</option>
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
                    {{ session()->get('edit') }}
                </div>
            @endif
            @if (session()->has('add'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('add') }}
                </div>
            @endif
            @if (session()->has('delete'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('delete') }}
                </div>
            @endif
            <div class="p-0 card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th class="">Nomor Kartu Keluarga</th>
                            <th class="">Nama Kepala Keluarga</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kartuKeluarga as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a class="text-light" data-toggle="tooltip" data-placement="top" title="{{$data->no_kk}}">{{$data->no_kk}}</a>
                                    <br />
                                    <small> Created {{$data->created_at}} </small>
                                </td>
                                <td class="">
                                    {{$data->nama}}
                                </td>
                                <td class="text-right project-actions">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail{{$data->id}}">
                                        <i class="fas fa-folder"> </i>
                                        View
                                    </a>
                                    <!-- Modal -->
                                    <div class="text-left modal fade" id="detail{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Kartu Keluarga : {{$data->nama}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mt-3 ml-4"><b>Nama Kepala Keluarga :</b> {{$data->nama}}</p>
                                                    <p class="ml-4"><b>Nomor Kartu Keluarga :</b> {{$data->no_kk}}</p>
                                                    <a href="{{route('print.kartu.keluarga.detail', $data->id)}}" target="blank" class="mr-2 btn btn-primary">
                                                        <i class="fa fa-print" aria-hidden="true"></i>
                                                        Print
                                                    </a>
                                                    @if (Auth::user()->role!='WATCHER')
                                                        <!-- Import Excel -->
                                                        {{-- <button type="button" class="mr-2 btn btn-primary" data-toggle="modal" data-target="#importExcel">
                                                            IMPORT EXCEL
                                                        </button>
                                                        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form action="" method="POST" enctype="multipart/form-data">
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
                                                                            <a href="{{route('template.kartuKeluargaDetail')}}">Download Template... <i class="fa fa-download" aria-hidden="true"></i></a>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Import</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div> --}}
                                                        <a href="{{route('export.kartuKeluarga.detail', $data->id)}}" class="my-3 mr-2 btn btn-success" target="_blank">EXPORT EXCEL</a>
                                                        <a href="{{ route('create.kk.detail', $data->id) }}" class="my-3 btn btn-info">TAMBAH DATA</a>
                                                    @endif
                                                    <div class="p-0 card-body">
                                                        <table class="table table-striped table-dark ">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th >Nama</th>
                                                                    <th >NIK</th>
                                                                    <th >Status hubungan Dalam Keluarga</th>
                                                                    <th class="text-right" style="display: {{Auth::user()->role=='WATCHER'?'none':''}}">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($kartuKeluargaDetail as $datakk)
                                                                    @if ($datakk->kartukeluarga_id==$data->id)
                                                                        <tr>
                                                                            <td>{{$loop->iteration}}</td>
                                                                            <td>
                                                                                <!-- Button trigger modal -->
                                                                                <a class="text-light" data-toggle="tooltip" data-placement="top" title="Nama">{{$datakk->penduduk->nama}}</a>
                                                                            </td>
                                                                            <td>
                                                                                <ul class="list-inline">
                                                                                    <li class="list-inline-item">
                                                                                        {{$datakk->penduduk->NIK}}
                                                                                    </li>
                                                                                </ul>
                                                                            </td>
                                                                            <td>
                                                                                <ul class="list-inline">
                                                                                    <li class="list-inline-item">
                                                                                        {{$datakk->status_dalam_keluarga}}
                                                                                    </li>
                                                                                </ul>
                                                                            </td>
                                                                            <td class="text-right project-actions">
                                                                                @if (Auth::user()->role!='WATCHER')
                                                                                    <a class="btn btn-info btn-sm" href="{{route('kartukeluarga-detail.edit', $datakk->id)}}">
                                                                                        <i class="fas fa-pencil-alt"> </i>
                                                                                        Edit
                                                                                    </a>
                                                                                    <form action="{{route('kartukeluarga-detail.destroy', $datakk->id)}}" method="POST" class="d-inline">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button class="btn btn-danger btn-sm">
                                                                                            <i class="fas fa-trash"> </i>
                                                                                            Delete
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Auth::user()->role!='WATCHER')
                                        <a class="btn btn-info btn-sm" href="{{route('kartukeluarga.edit', $data->id)}}">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </a>
                                        <form action="{{route('kartukeluarga.destroy', $data->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"> </i>
                                                Delete
                                            </button>
                                        </form>
                                    @endif
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection

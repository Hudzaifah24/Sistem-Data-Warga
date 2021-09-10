@extends('Layouts.dashboard')

@section('title', 'Data Kematian')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Data Kematian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Data Kematian</li>
                    </ol>
                </div>
            </div>
            <a href="{{route('print.kematian')}}" target="blank" class="mr-2 btn btn-primary">
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
                        <form action="{{route('import.kematian')}}" method="POST" enctype="multipart/form-data">
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
                <a href="{{ route('export.kematian') }}" class="my-3 mr-2 btn btn-success" target="_blank">EXPORT EXCEL</a>
                <a href="{{ route('kematian.create') }}" class="my-3 btn btn-info">TAMBAH DATA</a>
            @endif
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Kematian</h3>

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
                <form action="{{route('search.kematian')}}" method="GET" class="d-flex justify-content-between align-items-center">
                    <div class="row col-md-8">
                        <div class="col">
                            <input name="nama" type="text" id="inputName" class="form-control" placeholder="search Nama" />
                        </div>
                        <span class="mr-2 d-flex align-items-center">
                            Or
                        </span>
                        <div class="col">
                            <input name="NIK" type="number" id="inputName" class="form-control" placeholder="search NIK" />
                        </div>
                        <button type="submit" class="btn btn-primary d-inline">
                            <i class="mr-1 fas fa-search"></i>
                            Search
                        </button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-primary d-inline" data-toggle="modal" data-target="#filter">
                            <i class="mr-1 fas fa-filter"></i>
                            Filter
                        </button>
                        <a href="{{route('kematian.index')}}" class="btn btn-primary d-inline">
                            <i class="mr-1 fas fa-folder-open"></i>
                            All
                        </a>
                    </div>
                </form>
                <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <form action="{{route('filter.kematian')}}" method="GET">
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
                                              <label for="recipient-name" class="col-form-label">Tempat Kematian:</label>
                                              <select name="tempat_kematian" size="1" id="filter" class="form-control">
                                                @foreach ($filter as $data)
                                                    <option value="{{$data->tempat_kematian}}">{{$data->tempat_kematian}}</option>
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
            <div class="p-0 card-body" >
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th >Nama Penduduk</th>
                            <th >NIK Penduduk</th>
                            <th >Tempat Kematian</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kematian as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                <a>{{$data->nama}}</a>
                                <br />
                                <small> Created {{$data->created_at}} </small>
                                </td>
                                <td>{{$data->NIK}}</td>
                                <td>{{$data->tempat_kematian}}</td>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Penduduk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-dark">
                                                        <tr>
                                                            <th scope="col">
                                                                Nama Penduduk
                                                            </th>
                                                            <td scope="col">
                                                                {{$data->nama}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">
                                                                Tempat Kematian
                                                            </th>
                                                            <td scope="col">
                                                                {{$data->tempat_kematian}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">
                                                                Tanggal Kematian
                                                            </th>
                                                            <td scope="col">
                                                                {{$data->tanggal_kematian}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">
                                                                Alasan
                                                            </th>
                                                            <td scope="col">
                                                                {{$data->alasan}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">
                                                                Persetujuan
                                                            </th>
                                                            <td scope="col" class="">
                                                                <i class="fas fa-file-archive"></i>
                                                                <a href="{{asset('persetujuan_kematian/'.$data->persetujuan)}}" download class="text-light" data-toggle="tooltip" data-placement="top" title="{{$data->persetujuan}}">Download</a>
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
                                        <a class="btn btn-info btn-sm" href="{{route('kematian.edit', $data->id)}}">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </a>
                                        <form action="{{route('kematian.destroy', $data->id)}}" method="POST" class="d-inline">
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
                                <td colspan="5" class="py-3 text-center">
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

@extends('Layouts.dashboard')

@section('title', 'Dusun')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Dusun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Dusun</li>
                    </ol>
                </div>
            </div>
            <a href="{{route('print.dusun')}}" target="blank" class="mr-2 btn btn-primary">
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
                        <form action="{{route('import.dusun')}}" method="POST" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                                    @csrf

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required>
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
                <a href="{{ route('dusun.create') }}" class="my-3 mr-2 btn btn-info">TAMBAH DATA</a>
            @endif
                <a href="{{ route('export.dusun') }}" class="my-3 btn btn-success" target="_blank">EXPORT EXCEL</a>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                Dusun
            </h3>

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
                <form action="{{route('search.dusun')}}" method="GET" class="d-flex justify-content-between align-items-center">
                    <div class="gx-5 row col-md-4">
                        <div class="col">
                            <input name="dusun" type="text" id="inputName" class="form-control" placeholder="search Dusun" />
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
                        <a href="{{route('dusun.index')}}" class="btn btn-primary d-inline">
                            <i class="mr-1 fas fa-folder-open"></i>
                            All
                        </a>
                    </div>
                </form>
                <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <form action="{{route('filter.dusun')}}" method="GET">
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
                                              <label for="recipient-name" class="col-form-label">Alamat:</label>
                                              <select name="alamat" size="1" id="filter" class="form-control">
                                                  @foreach ($filter as $data)
                                                      <option value="{{$data->alamat}}">{{$data->alamat}}</option>
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
                        {{-- <form action="{{route('filter.dusun')}}" method="GET">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div>
                                      <div class="form-group row">
                                          <div class="text-center col-md-6">
                                              <label for="recipient-name" class="col-form-label">Tanggal:</label>
                                              <select name="tanggal" size="2" id="filter" class="form-control">
                                              @php
                                                  $a = date('d');
                                                  $b = 1;
                                                  $c = 1;
                                                  for ($i= 0; $i < $a; $i++) {
                                                      echo '<option value="'.$c++.'">'.$b++.'</option>';
                                                  };
                                                  @endphp
                                              </select>
                                          </div>

                                          <div class="text-center col-md-6">
                                              <label for="recipient-name" class="col-form-label">Bulan:</label>
                                              <select name="bulan" size="2" id="filter" class="form-control">
                                              @php
                                                  $a = date('m');
                                                  $b = 1;
                                                  $c = 1;
                                                  for ($i= 0; $i < $a; $i++) {
                                                      echo '<option value="'.$c++.'">'.$b++.'</option>';
                                                  };
                                                  @endphp
                                              </select>
                                          </div>

                                          <div class="text-center col-md-12">
                                              <label for="recipient-name" class="col-form-label">Tahun:</label>
                                              <select name="tahun" size="1" id="filter" class="form-control">
                                              @php
                                                  $a = date('Y');
                                                  $b = 2020;
                                                  $c = 2020;
                                                  for ($i= 2019; $i < $a; $i++) {
                                                      echo '<option value="'.$c++.'">'.$b++.'</option>';
                                                  };
                                                  @endphp
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Filter</button>
                              </div>
                        </form> --}}
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
                            <th class="text-left ">Nama</th>
                            <th class="">Alamat</th>
                            @if (Auth::user()->role!='WATCHER')
                                <th class="text-right">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dusun as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a class="text-light" data-toggle="tooltip" data-placement="top" title="{{$data->dusun}}">{{$data->dusun}}</a>
                                    <br />
                                    <small> Created {{$data->created_at}} </small>
                                </td>
                                <td class="">
                                    {{$data->alamat}}
                                </td>
                                @if (Auth::user()->role!='WATCHER')
                                    <td class="text-right project-actions">
                                        {{-- <a class="btn btn-primary btn-sm" href="{{route('dusun.show', $data->id)}}">
                                            <i class="fas fa-folder"> </i>
                                            View
                                        </a> --}}
                                        <a class="btn btn-info btn-sm" href="{{route('dusun.edit', $data->id)}}">
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </a>
                                        <form action="{{route('dusun.destroy', $data->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"> </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-3 text-center">
                                    Dusun Kosong!
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

{{-- @push('script-sebelum')
    <script>
        window.addEventListener("load", window.alert('Klick [OK] Untuk Lanjut'));
    </script>
@endpush --}}

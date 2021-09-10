@extends('Layouts.dashboard')

@section('title', 'Data User')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Data User</li>
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
            <a href="{{ route('user.create') }}" class="my-3 btn btn-info">TAMBAH DATA</a>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data user</h3>

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
                <form action="{{route('search.user')}}" method="GET" class="d-flex justify-content-between align-items-center">
                    <div class="row gx-5">
                        <div class="col">
                            <select name="role" class="form-control">
                                <option selected disabled>Select One</option>
                                <option value="SUPERADMIN">Super Admin</option>
                                <option value="ADMIN">Admin</option>
                                <option value="WATCHER">Watcher</option>
                            </select>
                        </div>
                        <button type="submit" class="mr-2 btn btn-primary d-inline">
                            <i class="mr-1 fas fa-search"></i>
                            Search
                        </button>
                    </div>
                    <div class="">
                        <a href="{{route('user.index')}}" class="btn btn-primary d-inline">
                            <i class="mr-1 fas fa-folder-open"></i>
                            All
                        </a>
                    </div>
                </form>
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
                <table class="table table-striped projects table-responsive-lg">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th >Role</th>
                        {{-- <th >Penanggung Jawab</th> --}}
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($user as $data)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a> {{$data->role}} </a>
                            <br />
                                <small> Created {{$data->created_at}} </small>
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">Detail Penduduk</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered table-dark">
                                                    <tr>
                                                        <th scope="col">
                                                            Role
                                                        </th>
                                                        <td scope="col">
                                                            {{$data->role}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">
                                                            Pertanggung Jawaban
                                                        </th>
                                                        <td scope="col">
                                                            {{$data->name}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">
                                                            Email
                                                        </th>
                                                        <td scope="col">
                                                            {{$data->email}}
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
                                <a class="btn btn-info btn-sm" href="{{route('user.edit', $data->id)}}">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <form action="{{route('user.destroy', $data->id)}}" method="POST" class="d-inline">
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

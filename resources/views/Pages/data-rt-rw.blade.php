@extends('Layouts.dashboard')

@section('title', 'Data RT / RW')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Data RT / RW</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Data RT / RW</li>
                    </ol>
                </div>
            </div>

            <!-- Import Excel -->
            <button type="button" class="mr-2 btn btn-primary" data-toggle="modal" data-target="#importExcel">
                IMPORT EXCEL
            </button>
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('import.rt.rw') }}" method="POST" enctype="multipart/form-data">
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
            <a href="{{ route('export.rt.rw') }}" class="my-3 mr-2 btn btn-success" target="_blank">EXPORT EXCEL</a>
            <a href="{{ route('rw.create') }}" class="my-3 btn btn-info">TAMBAH DATA</a>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data RT / RW</h3>

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
                <table class="table table-striped Data RT / RW">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th class="text-left">RT / RW</th>
                            <th >Nama Desa</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rt as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" class="text-light" data-toggle="tooltip" data-placement="top" title="KTP">{{ $data->RT }} / {{ $data->RW }}</a>
                                    <br />
                                    <small> Created {{ $data->created_at }} </small>
                                </td>
                                <td>
                                @if ($data->desa_id==null)
                                    <a class="btn btn-info btn-sm" href="{{ route('rw.edit', $data->id) }}">
                                        <i class="fas fa-pencil-alt"> </i>
                                        Tambah Desa
                                    </a>
                                @else
                                    {{ $data->desa->desa }}
                                @endif
                                </td>
                                <td class="text-right project-actions">
                                    <a class="btn btn-primary btn-sm" href="{{ route('rw.show', $data->id) }}">
                                        <i class="fas fa-folder"> </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('rw.edit', $data->id) }}">
                                        <i class="fas fa-pencil-alt"> </i>
                                        Edit
                                    </a>
                                    <form action="{{ route('rw.destroy', $data->id) }}" method="POST" class="">
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

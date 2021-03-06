@extends('Layouts.dashboard')

@section('title', 'Surat')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Surat</li>
                    </ol>
                </div>
            </div>

            <!-- Import Excel -->
            <button type="button" class="mr-2 btn btn-primary" data-toggle="modal" data-target="#importExcel">
                IMPORT EXCEL
            </button>
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('import.desa') }}" method="POST" enctype="multipart/form-data">
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
            <a href="{{ route('export.desa') }}" class="my-3 mr-2 btn btn-success" target="_blank">EXPORT EXCEL</a>
            <a href="{{ route('surat.create') }}" class="my-3 btn btn-info">TAMBAH DATA</a>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">surat</h3>

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
                <table class="table table-striped surat">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th class="text-left w-75">Nama Penduduk</th>
                            <th class="text-left">Jenis Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <!-- Button trigger modal -->
                                <a class="text-light" data-toggle="tooltip" data-placement="top" title="surat">Budi</a>
                                <br />
                                <small> Created  </small>
                            </td>
                            <td class="text-left">
                                Jenis Surat
                            </td>
                        </tr>
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

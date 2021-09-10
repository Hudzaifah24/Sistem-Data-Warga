@extends('Layouts.dashboard')

@section('title', 'Create Kartu Keluarga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Kartu Keluarga Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kartu Keluarga Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('kartukeluarga.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
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
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="penduduk" id="penduduk">
                            <div class="form-group">
                                <label for="inputName">Nomor Kartu Keluarga</label>
                                <input value="{{ old('no_kk') }}" name="no_kk" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">NIK Penduduk</label>
                                <select name="penduduk_id" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($penduduk as $data)
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <a href="{{ route('kartukeluarga.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Create new Kartu Keluarga
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

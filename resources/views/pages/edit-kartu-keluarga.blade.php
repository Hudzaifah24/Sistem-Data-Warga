@extends('Layouts.dashboard')

@section('title', 'Edit Kartu Keluarga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Kartu Keluarga Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kartu Keluarga Update</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('kartukeluarga.update', $datakk->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                            <div class="form-group">
                                <label for="inputName">Nomor Kartu Keluarga</label>
                                <input value="{{ $datakk->no_kk?$datakk->no_kk:old('no_kk') }}" name="no_kk" type="number" id="inputName" class="form-control @error('no_kk') is-invalid @enderror" />
                                @error('no_kk')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">NIK Penduduk</label>
                                <select name="penduduk_id" id="inputStatus" class="form-control @error('penduduk_id') is-invalid @enderror custom-select">
                                    @foreach ($penduduk as $data)
                                        @if ($data->jenis_kelamin == 'LAKILAKI')
                                            <option value="{{$data->id}}" {{$datakk->penduduk_id==$data->id?'selected':''}}>{{$data->NIK}} / {{$data->nama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('penduduk_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
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
                    Edit new Kartu Keluarga
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

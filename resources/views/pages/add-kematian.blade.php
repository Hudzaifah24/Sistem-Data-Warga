@extends('Layouts.dashboard')

@section('title', 'Create Kematian')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Kematian Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kematian Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('kematian.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kematian</h3>

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
                                <label for="inputName">NIK Penduduk</label>
                                <select name="penduduk_id" id="inputStatus" class="form-control custom-select @error('penduduk_id') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    @foreach ($penduduk as $data)
                                        <option value="{{$data->id}}">{{$data->NIK}} / {{$data->nama}}</option>
                                    @endforeach
                                </select>
                                @error('penduduk_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tempat Kematian</label>
                                <input value="{{ old('tempat_kematian') }}" name="tempat_kematian" type="text" id="inputName" class="form-control @error('tempat_kematian') is-invalid @enderror" />
                                @error('tempat_kematian')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="nama" id="nama">
                            <input type="hidden" name="NIK" id="NIK">
                            <div class="form-group">
                                <label for="inputName">Tanggal Kematian</label>
                                <input value="{{ old('tanggal_kematian') }}" name="tanggal_kematian" type="date" id="inputName" class="form-control @error('tanggal_kematian') is-invalid @enderror" />
                                @error('tanggal_kematian')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Alasan</label>
                                <input value="{{ old('alasan') }}" name="alasan" type="text" id="inputName" class="form-control @error('alasan') is-invalid @enderror" />
                                @error('alasan')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Akta Kematian (Photo)</label>
                                <input value="{{ old('persetujuan') }}" name="persetujuan" type="file" id="inputName" class="form-control" />
                                @error('persetujuan')
                                    <div class="alert alert-info" role="alert">
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
                <a href="{{ route('kematian.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Create new Kematian
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

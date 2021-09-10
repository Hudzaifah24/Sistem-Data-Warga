@extends('Layouts.dashboard')

@section('title', 'Edit kelahiran')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>kelahiran Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">kelahiran Update</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('kelahiran.update', $kelahiran->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">kelahiran</h3>

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
                                <label for="inputName">Nama Penduduk</label>
                                <select name="penduduk_id" id="inputStatus" class="form-control custom-select">
                                    @foreach ($penduduk as $data)
                                        <option value="{{$data->id}}" {{$data->id==$kelahiran->penduduk_id?'selected':''}}>{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputName">Persetujuan</label>
                                <input value="{{ old('persetujuan') }}" name="persetujuan" type="text" id="inputName" class="form-control" />
                            </div> --}}
                            <div class="form-group">
                                <label for="inputName">Masukkan Berkas Pendukung</label>
                                <input value="{{ old('persetujuan') }}" name="persetujuan" type="file" id="inputName" class="form-control" />
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <a href="{{ route('kelahiran.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Edit new kelahiran
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

@extends('Layouts.dashboard')

@section('title', 'Create Mutasi')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Mutasi Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Mutasi Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('mutasi.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">mutasi</h3>

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
                                    <option selected disabled>Select one</option>
                                    @foreach ($penduduk as $data)
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="nama">
                            <input type="hidden" name="alamat_sebelum">
                            <div class="form-group">
                                <label for="inputName">Alamat Tujuan</label>
                                <input value="{{ old('alamat_sesudah') }}" name="alamat_sesudah" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Alasan</label>
                                <input value="{{ old('alasan') }}" name="alasan" type="text" id="inputName" class="form-control" />
                            </div>
                            @if (Auth::user()->role=='SUPERADMIN')
                                <div class="form-group">
                                    <label for="inputName">Persetujuan</label>
                                    <select name="persetujuan" id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option value="1">Disetujui</option>
                                        <option value="0">Belum Disetujui</option>
                                    </select>
                                </div>
                            @endif
                            {{-- <div class="form-group">
                                <label for="inputName">Persetujuan</label>
                                <input value="{{ old('persetujuan') }}" name="persetujuan" type="text" id="inputName" class="form-control" />
                            </div> --}}
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
                    Create new mutasi
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

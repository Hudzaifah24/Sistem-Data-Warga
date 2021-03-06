@extends('Layouts.dashboard')

@section('title', 'Edit Dusun')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Dusun Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Dusun Update</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('dusun.update', $dusun->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Dusun</h3>

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
                                <label for="inputName">Nama</label>
                                <input value="{{ $dusun->dusun?$dusun->dusun:old('dusun') }}" name="dusun" type="text" id="inputName" class="form-control @error('dusun') is-invalid @enderror" />
                                @error('dusun')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Alamat</label>
                                <input value="{{ $dusun->alamat?$dusun->alamat:old('alamat') }}" name="alamat" type="text" id="inputName" class="form-control @error('alamat') is-invalid @enderror" />
                                @error('alamat')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
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
                <a href="{{ route('dusun.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Edit new dusun
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

@extends('Layouts.dashboard')

@section('title', 'Edit Desa Warga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Desa Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Desa Update</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('rw.update', $rt->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">RT/RW</h3>

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
                                <label for="inputName">Pilih Desa</label>
                                <select name="desa_id" id="inputStatus" class="form-control custom-select">
                                    @foreach ($desa as $data)
                                        <option value="{{ $data->id }}" {{ $rt->desa_id == $data->id ? 'selected' : '' }}>{{$data->desa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">RT</label>
                                <input value="{{ $rt->RT ? $rt->RT : old('RT') }}" name="RT" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">RW</label>
                                <input value="{{ $rt->RW ? $rt->RW : old('RW') }}" name="RW" type="number" id="inputName" class="form-control" />
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <a href="{{ route('rw.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Edit new Desa
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

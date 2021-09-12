@extends('Layouts.dashboard')

@section('title', 'Create kelahiran')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>kelahiran Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">kelahiran Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('kelahiran.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
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
                            <input type="hidden" name="dusun" id="dusun">
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input placeholder="Nama Lengkap" value="{{ old('nama') }}" name="nama" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tempat Lahir</label>
                                <div class="d-flex">
                                    <input placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text" id="inputName" class="form-control " />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tanggal Lahir</label>
                                <div class="d-flex">
                                    <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="date" id="inputName" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="LAKILAKI">Laki-laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                    <option value="UPNORMAL">Privasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Dusun</label>
                                <select name="dusun_id" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($dusun as $data)
                                        <option value="{{$data->id}}">{{$data->dusun}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">RT / RW</label>
                                <div class="d-flex">
                                    <input value="{{ old('RT') }}" name="RT" type="text" placeholder="RT" id="inputName" class="form-control" />
                                    <input value="{{ old('RW') }}" name="RW" type="text" placeholder="RW" id="inputName" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kelurahan</label>
                                <input value="{{ old('kelurahan') }}" name="kelurahan" type="text" id="inputName" placeholder="kelurahan" class="form-control " />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kecamatan</label>
                                <input value="{{ old('kecamatan') }}" name="kecamatan" type="text" id="inputName" placeholder="Kecamatan" class="form-control " />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Agama</label>
                                <select name="agama" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="ISLAM">Islam</option>
                                    <option value="KRISTEN">Kristen</option>
                                    <option value="BUDA">Buda</option>
                                    <option value="HINDU">Hindu</option>
                                    <option value="ATEIS">Ateis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kewarganegaraan</label>
                                <select name="kewarganegaraan" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                            {{-- <input type="hidden" name="namaKelahiran" id="namaKelahiran">
                            <input type="hidden" name="tempat_lahir" id="tempat_lahir">
                            <input type="hidden" name="tanggal_lahir" id="tanggal_lahir"> --}}
                            {{-- <input type="hidden" name="kelahiran" value="1" id="kelahiran"> --}}
                            <div class="form-group">
                                <label for="inputName">Masukkan Foto Akta Kelahiran</label>
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
                    Create new kelahiran
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

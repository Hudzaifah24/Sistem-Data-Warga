@extends('Layouts.dashboard')

@section('title', 'Create Data Warga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('warga.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Kartu Keluarga (KK)</h3>

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
                                    <option selected disabled>Select one</option>
                                    @foreach ($desa as $data)
                                        <option value="{{ $data->id }}">{{$data->desa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pilih RT / RW</label>
                                <div class="d-flex">
                                    <select name="rt_id" id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Pilih RT</option>
                                        @foreach ($rt as $data)
                                            <option value="{{ $data->id }}">{{$data->RT}}</option>
                                        @endforeach
                                    </select>
                                    <select name="rt_id" id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Pilih RW</option>
                                        @foreach ($rt as $data)
                                            <option value="{{ $data->id }}">{{$data->RW}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input value="{{ old('nama') }}" name="nama" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">No. KK</label>
                                <input value="{{ old('no_kk') }}" name="no_kk" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">NIK</label>
                                <input value="{{ old('NIK') }}" name="NIK" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="LAKI-LAKI">Laki-laki</option>
                                    <option value="WANITA">Perempuan</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputName">Tempat Lahir</label>
                                <input value="{{ old('') }}" name="tempat_lahir" type="text" id="inputName" class="form-control" />
                            </div> --}}
                            <div class="form-group">
                                <label for="inputName">Tempat / Tanggal Lahir</label>
                                <div class="d-flex">
                                    <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text" id="inputName" class="form-control " />
                                    <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="date" id="inputName" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Agama</label>
                                <select name="agama" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="ISLAM">Islam</option>
                                    <option value="KRISTEN">Kristen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pendidikan</label>
                                <input value="{{ old('pendidikan') }}" name="pendidikan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pekerjaan</label>
                                <input value="{{ old('pekerjaan') }}" name="pekerjaan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status Perkawinan</label>
                                <select name="status_perkawinan" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="KAWIN">Menikah</option>
                                    <option value="BELOM_KAWIN">Belum Menikah</option>
                                    <option value="BERCERAI">Bercerai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status Hubungan Dalam Keluarga</label>
                                <select name="status_hubungan_dalam_keluarga" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="AYAH">Ayah</option>
                                    <option value="IBU">Ibu</option>
                                    <option value="ANAK">Anak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kewarganegaraan</label>
                                <input value="{{ old('kewarganegaraan') }}" name="kewarganegaraan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">No. Paspor</label>
                                <input value="{{ old('no_paspor') }}" name="no_paspor" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">No. KITAS / KITAP</label>
                                <input value="{{ old('no_KITAS_KITAP') }}" name="no_KITAS_KITAP" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Ayah</label>
                                <input value="{{ old('nama_ayah') }}" name="nama_ayah" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Ibu</label>
                                <input value="{{ old('nama_ibu') }}" name="nama_ibu" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Gol. Darah</label>
                                <input value="{{ old('gol_darah') }}" name="gol_darah" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Alamat</label>
                                <input value="{{ old('alamat') }}" name="alamat" type="text" id="inputName" class="form-control" />
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputDescription">Alamat</label>
                                    <textarea
                                        id="inputDescription"
                                        class="form-control"
                                        rows="4"
                                        name="alamat"
                                    ></textarea>
                            </div> --}}
                            <div class="form-group">
                                <label for="inputName">Kecamatan</label>
                                <input value="{{ old('kecamatan') }}" name="kecamatan" type="text" id="inputName" placeholder="Kecamatan" class="form-control " />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Dibuat di Provinsi</label>
                                <input value="{{ old('provinsi') }}" name="provinsi" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Dibuat di Kota</label>
                                <input value="{{ old('kota') }}" name="kota" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">TTD</label>
                                <input value="{{ old('TTD') }}" name="TTD" type="file" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Foto</label>
                                <input value="{{ old('photo') }}" name="photo" type="file" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Berlaku Hingga</label>
                                <input name="berlaku" value="Seumur hidup" type="text" disabled id="inputName" class="form-control" />
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <a href="{{ route('warga.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Create new Data
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

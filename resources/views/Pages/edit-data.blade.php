@extends('Layouts.dashboard')

@section('title', 'Edit Data Warga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Update</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('warga.update', $penduduk->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                                    @foreach ($desa as $data)
                                        <option value="{{ $data->id }}" {{$data->id==$penduduk->desa_id?'selected':''}}>{{$data->desa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pilih RT / RW</label>
                                <div class="d-flex">
                                    <select name="rt_id" id="inputStatus" class="form-control custom-select">
                                        @foreach ($rt as $data)
                                            <option value="{{ $data->id }}" {{$data->id==$penduduk->rt_id?'selected':''}}>{{$data->RT}}</option>
                                        @endforeach
                                    </select>
                                    <select name="rt_id" id="inputStatus" class="form-control custom-select">
                                        @foreach ($rt as $data)
                                            <option value="{{ $data->id }}" {{$data->id==$penduduk->rt_id?'selected':''}}>{{$data->RW}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input value="{{ $penduduk->nama?$penduduk->nama:old('nama') }}" name="nama" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">No. KK</label>
                                <input value="{{ $penduduk->no_kk?$penduduk->no_kk:old('no_kk') }}" name="no_kk" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">NIK</label>
                                <input value="{{ $penduduk->NIK?$penduduk->NIK:old('NIK') }}" name="NIK" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="inputStatus" class="form-control custom-select">
                                    <option value="LAKI-LAKI" {{ $penduduk->jenis_kelamin=='LAKI-LAKI'?'selected':'' }}>Laki-laki</option>
                                    <option value="WANITA" {{ $penduduk->jenis_kelamin=='WANITA'?'selected':'' }}>Perempuan</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputName">Tempat Lahir</label>
                                <input value="{{ old('') }}" name="tempat_lahir" type="text" id="inputName" class="form-control" />
                            </div> --}}
                            <div class="form-group">
                                <label for="inputName">Tempat / Tanggal Lahir</label>
                                <div class="d-flex">
                                    <input value="{{ $penduduk->tempat_lahir?$penduduk->tempat_lahir:old('tempat_lahir') }}" name="tempat_lahir" type="text" id="inputName" class="form-control " />
                                    <input value="{{ $penduduk->tanggal_lahir?$penduduk->tanggal_lahir:old('tanggal_lahir') }}" name="tanggal_lahir" type="date" id="inputName" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Agama</label>
                                <select name="agama" id="inputStatus" class="form-control custom-select">
                                    <option value="ISLAM" {{ $penduduk->agama=='ISLAM'?'selected':'' }}>Islam</option>
                                    <option value="KRISTEN" {{ $penduduk->agama=='KRISTEN'?'selected':'' }}>Kristen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pendidikan</label>
                                <input value="{{ $penduduk->pendidikan?$penduduk->pendidikan:old('pendidikan') }}" name="pendidikan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pekerjaan</label>
                                <input value="{{ $penduduk->pekerjaan?$penduduk->pekerjaan:old('pekerjaan') }}" name="pekerjaan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status Perkawinan</label>
                                <select name="status_perkawinan" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="KAWIN" {{ $penduduk->status_perkawinan=='KAWIN'?'selected':'' }}>Menikah</option>
                                    <option value="BELOM_KAWIN" {{ $penduduk->status_perkawinan=='BELOM_KAWIN'?'selected':'' }}>Belum Menikah</option>
                                    <option value="BERCERAI" {{ $penduduk->status_perkawinan=='BERCERAI'?'selected':'' }}>Bercerai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status Hubungan Dalam Keluarga</label>
                                <select name="status_hubungan_dalam_keluarga" id="inputStatus" class="form-control custom-select">
                                    <option value="AYAH" {{ $penduduk->status_hubungan_dalam_keluarga=='AYAH'?'selected':'' }}>Ayah</option>
                                    <option value="IBU" {{ $penduduk->status_hubungan_dalam_keluarga=='IBU'?'selected':'' }}>Ibu</option>
                                    <option value="ANAK" {{ $penduduk->status_hubungan_dalam_keluarga=='ANAK'?'selected':'' }}>Anak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kewarganegaraan</label>
                                <input value="{{ $penduduk->kewarganegaraan?$penduduk->kewarganegaraan:old('kewarganegaraan') }}" name="kewarganegaraan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">No. Paspor</label>
                                <input value="{{ $penduduk->no_paspor?$penduduk->no_paspor:old('no_paspor') }}" name="no_paspor" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">No. KITAS / KITAP</label>
                                <input value="{{ $penduduk->no_KITAS_KITAP?$penduduk->no_KITAS_KITAP:old('no_KITAS_KITAP') }}" name="no_KITAS_KITAP" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Ayah</label>
                                <input value="{{ $penduduk->nama_ayah?$penduduk->nama_ayah:old('nama_ayah') }}" name="nama_ayah" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Ibu</label>
                                <input value="{{ $penduduk->nama_ibu?$penduduk->nama_ibu:old('nama_ibu') }}" name="nama_ibu" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Gol. Darah</label>
                                <input value="{{ $penduduk->gol_darah?$penduduk->gol_darah:old('gol_darah') }}" name="gol_darah" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Alamat</label>
                                <input value="{{ $penduduk->alamat?$penduduk->alamat:old('alamat') }}" name="alamat" type="text" id="inputName" class="form-control" />
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
                                <input value="{{ $penduduk->kecamatan?$penduduk->kecamatan:old('kecamatan') }}" name="kecamatan" type="text" id="inputName" placeholder="Kecamatan" class="form-control " />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Dibuat di Provinsi</label>
                                <input value="{{ $penduduk->provinsi?$penduduk->provinsi:old('provinsi') }}" name="provinsi" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Dibuat di Kota</label>
                                <input value="{{ $penduduk->kota?$penduduk->kota:old('kota') }}" name="kota" type="text" id="inputName" class="form-control" />
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
                    Edit new Data
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

@extends('Layouts.dashboard')

@section('title', 'Create KTP')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>KTP Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">KTP Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('ktp.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kartu Tanda Penduduk (KTP)</h3>
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
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="inputName">Pilih Nama Penduduk Anda</label>
                                {{-- <input name="search" type="search" id="inputName" class="form-control" />
                                Or --}}
                                <select name="warga_id" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select One</option>
                                    @foreach ($penduduk as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input name="nama" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">NIK</label>
                                <input name="NIK" type="number" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Dibuat di Provinsi</label>
                                <input name="provinsi" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Dibuat di Kota</label>
                                <input name="kota" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tempat / Tanggal Lahir</label>
                                <div class="d-flex">
                                    <input name="tempat_lahir" type="text" id="inputName" class="form-control " />
                                    <input name="tanggal_lahir" type="date" id="inputName" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="LAKI-LAKI">Laki-laki</option>
                                    <option value="WANITA">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Gol. Darah</label>
                                <input name="Gol_darah" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Alamat</label>
                                <input name="alamat" type="text" id="inputName" class="form-control" />
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
                                <label for="inputName">RT / RW</label>
                                <div class="d-flex">
                                    <input name="RT" type="text" id="inputName" placeholder="RT" class="form-control " />
                                    <input name="RW" type="text" id="inputName" placeholder="RW" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kel / Desa</label>
                                <input name="desa" type="text" id="inputName" placeholder="Kel/Desa" class="form-control " />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kecamatan</label>
                                <input name="kecamatan" type="text" id="inputName" placeholder="Kecamatan" class="form-control " />
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
                                <label for="inputStatus">Status Perkawinan</label>
                                <select name="status_perkawinan" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="KAWIN">Menikah</option>
                                    <option value="BELOM_KAWIN">Belum Menikah</option>
                                    <option value="BERCERAI">Bercerai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pekerjaan</label>
                                <input name="pekerjaan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pendidikan</label>
                                <input name="pendidikan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kewarganegaraan</label>
                                <input name="kewarganegaraan" type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Berlaku Hingga</label>
                                <input name="expired" value="Seumur hidup" type="text" disabled id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Dibuat</label>
                                <input name="dibuat" type="date" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">TTD</label>
                                <input name="TTD" type="file" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputName">Foto</label>
                                <input name="photo" type="file" id="inputName" class="form-control" />
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

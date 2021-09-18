@extends('Layouts.dashboard')

@section('title', 'Create Penduduk Warga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Penduduk Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Penduduk Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('penduduk.store') }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Penduduk</h3>

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
                                <label for="inputName">NIK</label>
                                <input value="{{ old('NIK') }}" placeholder="NIK" name="NIK" type="number" id="inputName" class="form-control @error('NIK') is-invalid @enderror" />
                                @error('NIK')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input value="{{ old('nama') }}" placeholder="Nama" name="nama" type="text" id="inputName" class="form-control @error('nama') is-invalid @enderror" />
                                @error('nama')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tempat Lahir</label>
                                <input value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" name="tempat_lahir" type="text" id="inputName" class="form-control @error('tempat_lahir') is-invalid @enderror" />
                                @error('tempat_lahir')
                                    <div class="alert alert-danger d-block" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tanggal Lahir</label>
                                <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="date" id="inputName" class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger d-block" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="inputStatus" class="form-control custom-select @error('jenis_kelamin') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    <option value="LAKILAKI">Laki-laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                    <option value="UPNORMAL">Privasi</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Dusun</label>
                                <select name="dusun_id" id="inputStatus" class="form-control custom-select @error('dusun_id') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    @foreach ($dusun as $data)
                                        <option value="{{$data->id}}">{{$data->dusun}}</option>
                                    @endforeach
                                </select>
                                @error('dusun_id')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">RT / RW</label>
                                <input value="{{ old('RT') }}" name="RT" type="text" placeholder="RT" id="inputName" class="form-control @error('RT') is-invalid @enderror" />
                                @error('RT')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">RT / RW</label>
                                <input value="{{ old('RW') }}" name="RW" type="text" placeholder="RW" id="inputName" class="form-control @error('RW') is-invalid @enderror" />
                                @error('RW')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kelurahan</label>
                                <input value="{{ old('kelurahan') }}" name="kelurahan" type="text" id="inputName" placeholder="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" />
                                @error('kelurahan')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kecamatan</label>
                                <input value="{{ old('kecamatan') }}" name="kecamatan" type="text" id="inputName" placeholder="Kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" />
                                @error('kecamatan')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Agama</label>
                                <select name="agama" id="inputStatus" class="form-control custom-select @error('agama') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    <option value="ISLAM">Islam</option>
                                    <option value="KRISTEN">Kristen</option>
                                    <option value="BUDA">Buda</option>
                                    <option value="HINDU">Hindu</option>
                                    <option value="ATEIS">Ateis</option>
                                </select>
                                @error('agama')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select name="status" id="inputStatus" class="form-control custom-select @error('status') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    <option value="MENIKAH">Menikah</option>
                                    <option value="BELUM_MENIKAH">Belum Menikah</option>
                                    <option value="BERCERAI">Bercerai</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pekerjaan</label>
                                <input value="{{ old('pekerjaan') }}" name="pekerjaan" placeholder="Pekerjaan" type="text" id="inputName" class="form-control @error('pekerjaan') is-invalid @enderror" />
                                @error('pekerjaan')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kewarganegaraan</label>
                                <select name="kewarganegaraan" id="inputStatus" class="form-control custom-select @error('kewarganegaraan') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                                @error('kewarganegaraan')
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
                <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Cancel</a>
                <button
                    type="submit"
                    class="float-right btn btn-success"
                >
                    Create new Penduduk
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

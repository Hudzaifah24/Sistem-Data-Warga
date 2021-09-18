@extends('Layouts.dashboard')

@section('title', 'Edit Penduduk Warga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Penduduk Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Penduduk Update</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Penduduk</h3>

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
                        <input type="hidden" name="dusun" id="dusun">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">NIK</label>
                                <input value="{{ $penduduk->NIK?$penduduk->NIK:old('NIK') }}" name="NIK" type="number" id="inputName" class="form-control @error('NIK') is-invalid @enderror" />
                                @error('NIK')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input value="{{ $penduduk->nama?$penduduk->nama:old('nama') }}" name="nama" type="text" id="inputName" class="form-control @error('nama') is-invalid @enderror" />
                                @error('nama')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tempat Lahir</label>
                                <input value="{{ $penduduk->tempat_lahir?$penduduk->tempat_lahir:old('tempat_lahir') }}" name="tempat_lahir" type="text" id="inputName" class="form-control @error('tempat_lahir') is-invalid @enderror" />
                                @error('tempat_lahir')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tanggal Lahir</label>
                                <input value="{{ $penduduk->tanggal_lahir?$penduduk->tanggal_lahir:old('tanggal_lahir') }}" name="tanggal_lahir" type="date" id="inputName" class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="inputStatus" class="form-control custom-select @error('jenis_kelamin') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    <option value="LAKILAKI" {{$penduduk->jenis_kelamin=='LAKILAKI'?'selected':''}}>Laki-laki</option>
                                    <option value="PEREMPUAN" {{$penduduk->jenis_kelamin=='PEREMPUAN'?'selected':''}}>Perempuan</option>
                                    <option value="UPNORMAL" {{$penduduk->jenis_kelamin=='UPNORMAL'?'selected':''}}>Privasi</option>
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
                                        <option value="{{$data->id}}" {{$data->id==$penduduk->dusun_id?'selected':''}}>{{$data->dusun}}</option>
                                    @endforeach
                                </select>
                                @error('dusun_id')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">RT / RW</label>
                                <input value="{{ $penduduk->RT?$penduduk->RT:old('RT') }}" name="RT" type="number" placeholder="RT" id="inputName" class="form-control @error('RT') is-invalid @enderror" />
                                @error('RT')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">RT / RW</label>
                                <input value="{{ $penduduk->RW?$penduduk->RW:old('RW') }}" name="RW" type="number" placeholder="RW" id="inputName" class="form-control @error('RW') is-invalid @enderror" />
                                @error('RW')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kelurahan</label>
                                <input value="{{ $penduduk->kelurahan?$penduduk->kelurahan:old('kelurahan') }}" name="kelurahan" type="text" id="inputName" placeholder="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" />
                                @error('kelurahan')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kecamatan</label>
                                <input value="{{ $penduduk->kecamatan?$penduduk->kecamatan:old('kecamatan') }}" name="kecamatan" type="text" id="inputName" placeholder="Kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" />
                                @error('kecamatan')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Agama</label>
                                <select name="agama" id="inputStatus" class="form-control custom-select @error('agama') is-invalid @enderror">
                                    <option value="ISLAM" {{$penduduk->agama=='ISLAM'?'selected':''}}>Islam</option>
                                    <option value="KRISTEN" {{$penduduk->agama=='KRISTEN'?'selected':''}}>Kristen</option>
                                    <option value="BUDA" {{$penduduk->agama=='BUDA'?'selected':''}}>Buda</option>
                                    <option value="HINDU" {{$penduduk->agama=='HINDU'?'selected':''}}>Hindu</option>
                                    <option value="ATEIS" {{$penduduk->agama=='ATEIS'?'selected':''}}>Ateis</option>
                                </select>
                                @error('agama')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select name="status" id="inputStatus" class="form-control custom-select @error('status') is-invalid @enderror">
                                    <option value="MENIKAH" {{$penduduk->status=='MENIKAH'?'selected':''}}>Menikah</option>
                                    <option value="BELUM_MENIKAH" {{$penduduk->status=='BELUM_MENIKAH'?'selected':''}}>Belum Menikah</option>
                                    <option value="BERCERAI" {{$penduduk->status=='BERCERAI'?'selected':''}}>Bercerai</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Pekerjaan</label>
                                <input value="{{ $penduduk->pekerjaan?$penduduk->pekerjaan:old('pekerjaan') }}" name="pekerjaan" type="text" id="inputName" class="form-control @error('pekerjaan') is-invalid @enderror" />
                                @error('pekerjaan')
                                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kewarganegaraan</label>
                                <select name="kewarganegaraan" id="inputStatus" class="form-control custom-select @error('kewarganegaraan') is-invalid @enderror">
                                    <option selected disabled>Select one</option>
                                    <option value="WNI" {{$penduduk->kewarganegaraan=='WNI'?'selected':''}}>WNI</option>
                                    <option value="WNA" {{$penduduk->kewarganegaraan=='WNA'?'selected':''}}>WNA</option>
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
                    Edit new Penduduk
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

@extends('Layouts.dashboard')

@section('title', 'Create Kartu Keluarga')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Kartu Keluarga Detail Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kartu Keluarga Detail Add</li>
                </ol>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{ route('kartukeluarga-detail.update', $detailkk->id) }}" method="POST" class="content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kartu Keluarga Detail</h3>

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
                            <input type="hidden" name="kartukeluarga_id" value="{{$detailkk->kartukeluarga_id}}">
                            <div class="form-group">
                                <label for="inputName">NIK Penduduk</label>
                                <select name="penduduk_id" id="inputStatus" class="form-control custom-select">
                                    @foreach ($penduduk as $data)
                                        <option value="{{$data->id}}" {{$data->id==$detailkk->penduduk_id?'selected':''}}>{{$data->NIK}} / {{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($detailkk->status_dalam_keluarga!='AYAH')
                                <div class="form-group">
                                    <label for="inputName">Stutus Hubungan Dalam Keluarga</label>
                                    <select name="status_dalam_keluarga" id="inputStatus" class="form-control custom-select">
                                        <option value="IBU" {{$detailkk->status_dalam_keluarga=='IBU'?'selected':''}}>Ibu</option>
                                        <option value="ANAK" {{$detailkk->status_dalam_keluarga=='ANAK'?'selected':''}}>Anak</option>
                                    </select>
                                </div>
                            @endif
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
                    Create new Kartu Keluarga
                </button>
                </div>
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection

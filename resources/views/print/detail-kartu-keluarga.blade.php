@extends('Layouts.print')

@section('title', 'Detail Kartu Keluarga')

@section('content')
    <div class="">
        <div class="card">
            <div class="p-0 card-body">
            <p class="mt-3 ml-4"><b>Nama Kepala Keluarga :</b> {{$kartuKeluarga->penduduk->nama}} </p>
            <p class="ml-4"><b>Nomor Kartu Keluarga :</b> {{$kartuKeluarga->no_kk}} </p>
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th >Nama</th>
                            <th >NIK</th>
                            <th >Status hubungan Dalam Keluarga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kartuKeluargaDetail as $datakk)
                            @if ($datakk->kartukeluarga_id==$kartuKeluarga->id)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$datakk->penduduk->nama}}</td>
                                    <td>{{$datakk->penduduk->NIK}}</td>
                                    <td>{{$datakk->status_dalam_keluarga}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script-sebelum')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endpush

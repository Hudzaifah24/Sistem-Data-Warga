@extends('Layouts.print')

@section('title', 'Print Data Kelahiran')

@section('content')
    <div class="">
        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="p-0 card-body" style="">
                <table class="table table-striped projects" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Penduduk</th>
                            <th scope="col" >Dusun</th>
                            <th scope="col" >Tempat Kelahiran</th>
                            <th scope="col" >Tanggal Kelahiran</th>
                            <th scope="col" >Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelahiran as $data)
                            <tr>
                                <td >{{$loop->iteration}}</td>
                                <td >{{$data->namaKelahiran}}</td>
                                <td >{{$data->dusun}}</td>
                                <td >{{$data->tempat_lahir}}</td>
                                <td >{{$data->tanggal_lahir}}</td>
                                @if ($data->jenis_kelamin=='LAKILAKI')
                                    <td class="" >Laki-Laki</td>
                                @elseif ($data->jenis_kelamin=='PEREMPUAN')
                                    <td class="" >Perempuan</td>
                                @elseif ($data->jenis_kelamin=='UPNORMAL')
                                    <td class="" >Upnormal</td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-3 text-center">
                                    Data Kosong!
                                </td>
                            </tr>
                        @endforelse
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

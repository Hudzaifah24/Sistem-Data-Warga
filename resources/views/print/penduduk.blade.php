@extends('Layouts.print')

@section('title', 'Print Data Penduduk')

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
                                <th scope="col" class="">#</th>
                                <th scope="col" class="">NIK</th>
                                <th scope="col" class="">Nama</th>
                                <th scope="col" class="">Umur</th>
                                <th scope="col" class="">Jenis Kelamin</th>
                                <th scope="col" class="" >Nama Dusun</th>
                                <th scope="col" class="" >RT / RW</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penduduk as $data)
                                <tr>
                                    <td class="">{{ $loop->iteration }}</td>
                                    <td class="">{{$data->NIK}}</td>
                                    <td class="">{{$data->nama}}</td>
                                    @php
                                        $now = date('Y');
                                        $lahir = date_create($data->tanggal_lahir);
                                        $date = date_format($lahir, 'Y');
                                        $umur = $now - $date;
                                    @endphp
                                    <td class="">{{$umur}}</td>
                                    <td class="">{{$data->jenis_kelamin}}</td>
                                    <td class="">{{$data->dusun}}</td>
                                    <td class="">{{$data->RT}} / {{$data->RW}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center"colspan="5" class="py-3 text-center">
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

@push('script-sesudah')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endpush

@extends('Layouts.print')

@section('title', 'Print Data Kematian')

@section('content')
    <div class="">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="p-0 card-body" >
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th >Nama Penduduk</th>
                                <th >NIK Penduduk</th>
                                <th >Tanggal kematian</th>
                                <th >Tempat kematian</th>
                                <th >Alasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kematian as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->NIK}}</td>
                                    <td>{{$data->tanggal_kematian}}</td>
                                    <td>{{$data->tempat_kematian}}</td>
                                    <td>{{$data->alasan}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-3 text-center">
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

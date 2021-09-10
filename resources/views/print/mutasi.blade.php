@extends('Layouts.print')

@section('title', 'Print Data Mutasi')

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
                            <th >Alamat Sebelumnya</th>
                            <th >Alamat Tujuan</th>
                            <th >Alasan</th>
                            <th >Persetujuan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($mutasi as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->alamat_sebelum}}</td>
                                <td>{{$data->alamat_sesudah}}</td>
                                <td>{{$data->alasan}}</td>
                                <td>
                                    @if ($data->persetujuan==0)
                                        Belum Disetujui
                                    @else
                                        Disetujui
                                    @endif
                                </td>
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

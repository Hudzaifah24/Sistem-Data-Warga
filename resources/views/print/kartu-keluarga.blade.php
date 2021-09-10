@extends('Layouts.print')

@section('title', 'Print Kartu Keluarga')

@section('content')
    <div class="">
        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="p-0 card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th class="">Nomor Kartu Keluarga</th>
                            <th class="">Nama Kepala Keluarga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kartuKeluarga as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$data->no_kk}}
                                </td>
                                <td class="">
                                    {{$data->nama}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-3 text-center">
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

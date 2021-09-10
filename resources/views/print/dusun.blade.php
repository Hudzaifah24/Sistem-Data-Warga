@extends('Layouts.print')

@section('title', 'Print Dusun')

@section('content')
    <div class="">
            <div class="p-0 card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th class="text-left ">Nama</th>
                            <th class="">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dusun as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$data->dusun}}
                                </td>
                                <td class="">
                                    {{$data->alamat}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-3 text-center">
                                    Dusun Kosong!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@push('script-sesudah')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endpush

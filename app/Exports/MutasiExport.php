<?php

namespace App\Exports;

use App\Models\Mutasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MutasiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mutasi::get();
    }

    public function map($mutasi) : array
    {
        return [
            $mutasi->id,
            $mutasi->nama,
            $mutasi->alamat_sebelum,
            $mutasi->alamat_sesudah,
            $mutasi->alasan,
            $mutasi->persetujuan==1?'Disetujui':'Tidak Disetujui',
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'Nama',
            'Alamat Sebelum',
            'Alamat Tujuan',
            'Alasan',
            'Persetujuan',
        ];
    }
}

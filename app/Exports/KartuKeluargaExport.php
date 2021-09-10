<?php

namespace App\Exports;

use App\Models\KartuKeluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KartuKeluargaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KartuKeluarga::with(['penduduk'])->get();
    }

    public function map($kartukeluarga) : array
    {
        return [
            $kartukeluarga->id,
            $kartukeluarga->no_kk,
            $kartukeluarga->nama,
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'Nomer kartu Keluarga',
            'Nama',
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Kelahiran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KelahiranExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kelahiran::get();
    }

    public function map($kelahiran) : array
    {
        return [
            $kelahiran->id,
            $kelahiran->namaKelahiran,
            $kelahiran->dusun,
            $kelahiran->tempat_lahir,
            $kelahiran->tanggal_lahir,
            $kelahiran->jenis_kelamin,
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'Nama',
            'Dusun',
            'Tempat Kelahiran',
            'Waktu Kelahiran',
            'Jenis Kelamin',
        ];
    }
}

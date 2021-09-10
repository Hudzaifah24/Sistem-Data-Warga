<?php

namespace App\Exports;

use App\Models\Kematian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KematianExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kematian::with(['penduduk'])->get();
    }

    public function map($kematian) : array
    {
        return [
            $kematian->id,
            $kematian->nama,
            $kematian->NIK,
            $kematian->tempat_kematian,
            $kematian->tanggal_kematian,
            $kematian->alasan,
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'Nama',
            'NIK',
            'Tempat Kematian',
            'Waktu Kematian',
            'Alasan',
        ];
    }
}

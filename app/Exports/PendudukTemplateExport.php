<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendudukTemplateExport implements WithHeadings
{
    public function headings() : array
    {
        return [
            '#',
            'NIK',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Dusun',
            'RT',
            'RW',
            'Kelurahan',
            'Kecamatan',
            'Agama',
            'Status',
            'Pekerjaan',
            'kewarganegaraan',
            'Kepala Keluarga',
        ];
    }
}

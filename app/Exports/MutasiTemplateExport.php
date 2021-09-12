<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class MutasiTemplateExport implements WithHeadings
{
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

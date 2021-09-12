<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class KematianTemplateExport implements WithHeadings
{
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

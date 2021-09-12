<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class KelahiranTemplateExport implements WithHeadings
{
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

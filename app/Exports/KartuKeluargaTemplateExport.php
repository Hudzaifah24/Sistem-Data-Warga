<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KartuKeluargaTemplateExport implements WithHeadings
{
    public function headings() : array
    {
        return [
            '#',
            'Nomer kartu Keluarga',
            'Nama',
        ];
    }
}

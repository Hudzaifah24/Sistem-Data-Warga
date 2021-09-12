<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KartuKeluargaDetailTemplateExport implements WithHeadings
{
    public function headings() : array
    {
        return [
            '#',
            'Status Dalam Berkeluarga',
            'No KK',
            'Milik',
        ];
    }
}

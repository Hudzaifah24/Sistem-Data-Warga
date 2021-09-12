<?php

namespace App\Exports;

use App\Models\Dusun;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DusunTemplateExport implements WithHeadings
{
    public function headings() : array
    {
        return [
            '#',
            'dusun',
            'Alamat',
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Dusun;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DusunExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dusun::get();
    }

    public function map($dusun) : array {
        return [
            $dusun->id,
            $dusun->dusun,
            $dusun->alamat,
        ];
    }

    public function headings() : array {
        return [
            '#',
            'Dusun',
            'Alamat',
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Desa;
use Maatwebsite\Excel\Concerns\FromCollection;

class DesaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Desa::all();
    }
}

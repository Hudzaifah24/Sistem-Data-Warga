<?php

namespace App\Imports;

use App\Models\KartuKeluarga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KartuKeluargaImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KartuKeluarga([
            'no_kk' => $row[1],
            'nama' => $row[2],
        ]);
    }

    public function startRow() : int
    {
        return 2;
    }
}

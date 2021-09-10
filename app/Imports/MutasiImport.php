<?php

namespace App\Imports;

use App\Models\Mutasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MutasiImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mutasi([
            'nama' => $row[1],
            'alamat_sebelum' => $row[2],
            'alamat_sesudah' => $row[3],
            'alasan' => $row[4],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

<?php

namespace App\Imports;

use App\Models\Kelahiran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KelahiranImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kelahiran([
            'namaKelahiran' => $row[1],
            'dusun' => $row[2],
            'tempat_lahir' => $row[3],
            'tanggal_lahir' => $row[4],
            'jenis_kelamin' => $row[5],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

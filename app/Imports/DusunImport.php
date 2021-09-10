<?php

namespace App\Imports;

use App\Models\Dusun;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DusunImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Dusun([
            'dusun' => $row[1],
            'alamat' => $row[2]
        ]);
    }

    public function startRow() : int
    {
        return 2;
    }
}

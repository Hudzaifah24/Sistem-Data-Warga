<?php

namespace App\Imports;

use App\Models\Kematian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KematianImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kematian([
            'nama' => $row[1],
            'NIK' => $row[2],
            'tempat_kematian' => $row[3],
            'tanggal_kematian' => $row[4],
            'alasan' => $row[5],
        ]);
    }

    public function startRow() : int
    {
        return 2;
    }
}

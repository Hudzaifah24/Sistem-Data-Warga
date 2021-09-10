<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PendudukImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penduduk([
            'NIK' => $row[1],
            'nama' => $row[2],
            'tempat_lahir' => $row[3],
            'tanggal_lahir' => $row[4],
            'jenis_kelamin' => $row[5],
            'dusun' => $row[6],
            'RT' => $row[7],
            'RW' => $row[8],
            'kelurahan' => $row[9],
            'kecamatan' => $row[10],
            'agama' => $row[11],
            'status' => $row[12],
            'pekerjaan' => $row[13],
            'kewarganegaraan' => $row[14],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

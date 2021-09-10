<?php

namespace App\Imports;

use App\Models\Warga;
use Maatwebsite\Excel\Concerns\ToModel;

class WargasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Warga([
            'nama' => $row[1],
            'no_kk' => $row[2],
            'NIK' => $row[3],
            'jenis_kelamin' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => $row[6],
            'agama' => $row[7],
            'gol_darah' => $row[8],
            'pendidikan' => $row[9],
            'pekerjaan' => $row[10],
            'status_perkawinan' => $row[11],
            'status_hubungan_dalam_keluarga' => $row[12],
            'alamat' => $row[13],
            'kewarganegaraan' => $row[14],
            'no_paspor' => $row[15],
            'no_KITAS_KITAP' => $row[16],
            'nama_ayah' => $row[17],
            'nama_ibu' => $row[18],
            'berlaku' => $row[19],
            'desa_id' => $row[20],
            'rt_id' => $row[21],
            'kecamatan' => $row[22],
            'kota' => $row[23],
            'provinsi' => $row[24],
            'code_pos' => $row[25],
            'TTD' => $row[26],
            'photo' => $row[27],
        ]);
    }
}

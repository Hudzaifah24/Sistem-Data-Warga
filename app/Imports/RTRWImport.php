<?php

namespace App\Imports;

use App\Models\RTRW;
use Maatwebsite\Excel\Concerns\ToModel;

class RTRWImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RTRW([
            'RT' => $row[1],
            'RW' => $row[2],
        ]);
    }
}

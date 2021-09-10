<?php

namespace App\Exports;

use App\Models\DetailKartuKeluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KartuKeluargaDetailExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return DetailKartuKeluarga::with(['kartuKeluarga', 'penduduk'])->where('kartukeluarga_id', $this->id)->get();
    }

    public function map($detailkk) : array
    {
        return [
            $detailkk->id,
            $detailkk->status_dalam_keluarga,
            $detailkk->kartuKeluarga->no_kk,
            $detailkk->penduduk->nama,
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'Status Dalam Berkeluarga',
            'No KK',
            'Milik',
        ];
    }
}

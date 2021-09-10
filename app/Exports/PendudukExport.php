<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendudukExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penduduk::with(['dusun'])->get();
    }

    public function map($penduduk) : array {
        return [
            $penduduk->id,
            $penduduk->NIK,
            $penduduk->nama,
            $penduduk->tempat_lahir,
            $penduduk->tanggal_lahir,
            $penduduk->jenis_kelamin,
            $penduduk->dusun,
            $penduduk->RT,
            $penduduk->RW,
            $penduduk->kelurahan,
            $penduduk->kecamatan,
            $penduduk->agama,
            $penduduk->status,
            $penduduk->pekerjaan,
            $penduduk->kewarganegaraan,
            $penduduk->kepala_keluarga,
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'NIK',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Dusun',
            'RT',
            'RW',
            'Kelurahan',
            'Kecamatan',
            'Agama',
            'Status',
            'Pekerjaan',
            'kewarganegaraan',
            'Kepala Keluarga',
        ];
    }
}

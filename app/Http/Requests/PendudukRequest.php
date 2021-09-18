<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendudukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'NIK' => 'required|unique:penduduk,NIK,'.$this->penduduk.',id|max:18|min:16',
            'nama' => 'required|max:20',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'dusun_id' => 'required',
            'RT' => 'required|max:4',
            'RW' => 'required|max:4',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'NIK.required' => 'No NIK Wajib Diisi',
            'NIK.unique' => 'No NIK Sudah Terpakai',
            'NIK.max' => 'No NIK Maximal 18 Karakter',
            'NIK.min' => 'No NIK Minimal 16 Karakter',
            'nama.required' => 'Nama Wajib Diisi',
            'nama.max' => 'Nama Maximal 20 Karakter',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Dipilih',
            'dusun_id.required' => 'Dusun Wajib Dipilih',
            'RT.required' => 'RT Wajib Diisi',
            'RT.max' => 'RT Maximal 4 Karakter',
            'RW.required' => 'RW Wajib Diisi',
            'RW.required' => 'RW Maximal 4 Karakter',
            'kelurahan.required' => 'Kelurahan Wajib Diisi',
            'kecamatan.required' => 'Kecamatan Wajib Diisi',
            'agama.required' => 'Agama Wajib Dipilih',
            'status.required' => 'Status Wajib Dipilih',
            'pekerjaan.required' => 'Pekerjaan Wajib Diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan Wajib Dipilih',
        ];
    }
}

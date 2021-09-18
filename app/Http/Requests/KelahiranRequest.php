<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelahiranRequest extends FormRequest
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
            'NIK' => 'required|max:18|min:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'dusun_id' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'NIK.required' => 'Nomor NIK Wajib Diisi',
            'NIK.max' => 'Nomor NIK Maximal 18 Karakter',
            'NIK.min' => 'Nomor NIK Minimal 16 Karakter',
            'nama.required' => 'Nama Wajib Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi',
            'dusun_id.required' => 'Dusun Wajib Dipilih',
            'RT.required' => 'RT Wajib Diisi',
            'RW.required' => 'RW Wajib Diisi',
            'kelurahan.required' => 'Kelurahan Wajib Diisi',
            'kecamatan.required' => 'Kecamatan Wajib Diisi',
            'agama.required' => 'Agama Wajib Diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi',
        ];
    }
}

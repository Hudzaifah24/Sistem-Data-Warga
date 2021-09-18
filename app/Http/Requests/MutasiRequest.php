<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MutasiRequest extends FormRequest
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
            'penduduk_id' => 'required',
            'alamat_sesudah' => 'required',
            'alasan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'penduduk_id.required' => 'Pilih Penduduk Yang Hendak Pindah',
            'alamat_sesudah.required' => 'Alamat Tujuan Wajib Diisi',
            'alasan.required' => 'Alasan Harus Jelas, Maka Isilah!'
        ];
    }
}

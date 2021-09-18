<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KematianRequest extends FormRequest
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
            'tempat_kematian' => 'required',
            'tanggal_kematian' => 'required',
            'alasan' => 'required',
            'persetujuan' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'penduduk_id.required' => 'Penduduk Yang Mati Wajib Dipilih',
            'tempat_kematian.required' => 'Tempat Kematian Wajib Diisi',
            'tanggal_kematian.required' => 'Tanggal Kematian Wajib Diisi',
            'alasan.required' => 'Alasan Wajib Diisi',
            'persetujuan.nullable' => 'Photo Tidak Wajib Diisi',
        ];
    }
}

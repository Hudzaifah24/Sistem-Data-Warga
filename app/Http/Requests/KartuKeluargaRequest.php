<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KartuKeluargaRequest extends FormRequest
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
            'no_kk' => 'required|min:16|max:16',
            'penduduk_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'no_kk.required' => 'No Kartu Keluarga Wajib Diisi',
            'no_kk.min' => 'No Kartu Keluarga Minimal 16',
            'no_kk.max' => 'No Kartu Keluarga Maximal 16',
            'penduduk_id.required' => 'Kepala keluarga Wajib Dipilih'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DusunRequest extends FormRequest
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
            'dusun' => 'required|max:20',
            'alamat' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'dusun.required' => 'Dusun Wajib Diisi!',
            'dusun.max' => 'Maximal 20 karakter!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'alamat.max' => 'Maximal 20 Karakter!',
        ];
    }
}

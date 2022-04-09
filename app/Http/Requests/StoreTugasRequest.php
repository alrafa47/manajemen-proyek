<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTugasRequest extends FormRequest
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
            'bidangkeahlian' => 'required',
            'pegawai' => 'required',
            'proyek' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
        ];
    }
}

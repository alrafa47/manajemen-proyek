<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
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
            'nama_pegawai' => 'required|string',
            'tlp_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_pegawai' => 'required',
            'email_pegawai' => 'required|email',
            'jabatan' => 'required',
            'kualifikasi' => 'required',
            'username' => 'required',
            'password' => 'required',
        ];
    }
}

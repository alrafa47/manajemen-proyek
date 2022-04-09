<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyekRequest extends FormRequest
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
            'nama_proyek' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'spk' => 'required',
            'bast' => 'required',
            'kontrak_kerja' => 'required',
            'nama_klien' => 'required',
            'tlp_klien' => 'required',
            'alamat_klien' => 'required',
            'pegawai' => 'required',
            'lap_pendahuluan' => 'required',
            'lap_akhir' => 'required',
        ];
    }
}

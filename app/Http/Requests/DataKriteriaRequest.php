<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataKriteriaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    { 
        return [
            'keterangan' => 'required|max:100',
            'kode_kriteria' => 'required|max:100',
            'bobot' => 'required|numeric',
            'jenis' => 'required|max:100',
            'id_data_kegiatan' => 'required|exists:data_kegiatan,id'
        ];
    }
}


<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataSubKriteriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_data_kriteria' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required'
        ];
    }
}

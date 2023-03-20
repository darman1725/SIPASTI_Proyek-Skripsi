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
            'deskripsi' => 'required',
            'nilai' => 'required'
        ];
    }
}

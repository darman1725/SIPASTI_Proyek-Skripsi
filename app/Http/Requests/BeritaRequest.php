<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
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
            'judul' => 'required',
            'isi' => 'required',
            'kategori' => 'required',
            'tanggal_publikasi' => 'required|date',
            'file' => 'nullable|mimes:jpeg,png,mp4,doc,pdf',
        ];
    }
}

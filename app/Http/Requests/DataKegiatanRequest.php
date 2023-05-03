<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataKegiatanRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|in:Lapangan,Pengolahan',
            'level' => 'required|string|in:Umum,Provinsi,Kabupaten/Kota',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ];
    }

}
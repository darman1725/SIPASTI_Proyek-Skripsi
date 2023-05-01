<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nik' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['required', 'string', 'in:admin,user'],
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'NIK wajib diisi',
            'nik.numeric' => 'NIK harus berupa angka',
            'nik.unique' => 'NIK sudah digunakan oleh pengguna lain',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berupa alamat email yang valid',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan oleh pengguna lain',
            'password.min' => 'Password harus terdiri dari minimal :min karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'avatar' => 'image|max:2048',
            'name' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'url_website' => 'required',
            'url_github' => 'required',
            'url_facebook' => 'required',
            'url_twitter' => 'required',
            'url_instagram' => 'required',
            'url_linkedin' => 'required',
            'address' => 'required',
            'bio' => 'required',
        ];
    }
}
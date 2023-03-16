<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'app_name' => 'required',
            'footer_text' => 'required',
            'email' => 'required',
            'facebook_url' => 'required',
            'twitter_url' => 'required',
            'instagram_url' => 'required',
            'linkedin_url' => 'required',
            'youtube_url' => 'required',
            'meta_site_name' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'meta_image' => 'required',
            'meta_fb_app_id' => 'required',
            'meta_twitter_site' => 'required',
            'meta_twitter_creator' => 'required',
            'google_analytics' => 'required',
        ];
    }
}
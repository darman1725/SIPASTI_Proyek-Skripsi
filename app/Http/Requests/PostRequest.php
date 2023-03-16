<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required|min:3',
            'content' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
            'image' => 'required|image|max:2048',
            'status' => 'required',
            'published_at' => 'required',
        ];
    }
}
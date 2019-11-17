<?php

namespace App\Components\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'url_identifier' => 'required|string|alpha|min:3|max:10|unique:blogs',
            'name'           => 'required|string',
            'cover_image'    => 'required|url',
            'about'          => 'required|string',
        ];
    }
}

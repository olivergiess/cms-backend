<?php

namespace App\Components\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url_identifier' => 'string|alpha|min:3|max:10|unique:blogs',
            'name'           => 'string',
            'cover_image'    => 'url',
            'about'          => 'string',
        ];
    }
}

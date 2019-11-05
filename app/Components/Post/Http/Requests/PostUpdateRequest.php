<?php

namespace App\Components\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title'       => 'string',
            'cover_image' => 'url',
            'body'        => 'string',
            'publish_at'  => 'date_format:Y-m-d',
        ];
    }
}

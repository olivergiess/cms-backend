<?php

namespace App\Components\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'       => 'required|string',
            'cover_image' => 'required|url',
            'body'        => 'required|string',
            'publish_at'  => 'required|date_format:Y-m-d',
        ];
    }
}

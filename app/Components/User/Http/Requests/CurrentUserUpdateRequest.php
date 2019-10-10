<?php

namespace App\Components\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrentUserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'email',
            'slug' => 'string|alpha|min:3|max:10',
        ];
    }
}

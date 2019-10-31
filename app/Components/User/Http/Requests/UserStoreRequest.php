<?php

namespace App\Components\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'    => 'required|string|alpha',
            'last_name'     => 'required|string|alpha',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:8',
            'slug'          => 'required|unique:users,slug|string|alpha|min:3|max:10',
            'date_of_birth' => 'date|date_format:YYYY-MM-DD',
        ];
    }
}

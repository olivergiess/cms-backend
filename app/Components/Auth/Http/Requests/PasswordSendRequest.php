<?php

namespace App\Components\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordSendRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}

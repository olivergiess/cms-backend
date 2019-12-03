<?php

namespace App\Components\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserVerifyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'expiry' => 'required|date|after:now',
            'email'  => 'required|email',
            'token'  => 'required|string|signature:email,expiry'
        ];
    }
}

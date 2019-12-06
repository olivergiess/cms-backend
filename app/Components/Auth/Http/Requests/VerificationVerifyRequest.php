<?php

namespace App\Components\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerificationVerifyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'  => 'required|email',
            'expiry' => 'required|int',
            'token'  => 'required|string'
        ];
    }
}

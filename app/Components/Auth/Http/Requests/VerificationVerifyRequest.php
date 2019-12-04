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
            'expiry' => 'required|int',
            'email'  => 'required|email',
            'token'  => 'required|string|signature:email,expiry'
        ];
    }
}

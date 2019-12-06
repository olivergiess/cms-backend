<?php

namespace App\Components\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
		return [
		    'email'     => 'required|email',
            'expiry'    => 'required|int',
            'signature' => 'required|string',
            'password'  => 'required|string'
        ];
    }
}

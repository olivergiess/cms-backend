<?php

namespace App\Components\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\IsCurrentPassword;

class CurrentUpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'string', new IsCurrentPassword],
            'new_password'     => 'required|string|min:8'
        ];
    }
}

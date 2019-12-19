<?php

namespace App\Components\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrentUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'       => 'string',
            'last_name'        => 'string',
            'facebook_user_id' => 'nullable|string',
            'instagram_handle' => 'nullable|string'
        ];
    }
}

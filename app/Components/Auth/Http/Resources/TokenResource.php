<?php

namespace App\Components\Auth\Http\Resources;

use App\Components\Base\Http\Resources\BaseResource;

class TokenResource extends BaseResource
{
    public function structure()
    {
        return [
        	'access_token' => $this->resource,
			'expires_in'  => auth()->factory()->getTTL() * 60,
		];
    }
}

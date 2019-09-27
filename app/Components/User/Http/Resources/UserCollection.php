<?php

namespace App\Components\User\Http\Resources;

use App\Components\Base\Http\Resources\BaseCollection;

class UserCollection extends BaseCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

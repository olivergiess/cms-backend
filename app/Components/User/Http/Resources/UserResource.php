<?php

namespace App\Components\User\Http\Resources;

use App\Components\Base\Http\Resources\BaseResource;
use App\Models\User;
use App\Components\Blog\Http\Resources\BlogCollection;

class UserResource extends BaseResource
{
    public function __construct(User $resource)
    {
        parent::__construct($resource);
    }

    protected $relations = [
    	'blogs' => BlogCollection::class
	];

    protected function structure()
    {
        return [
            'type'       => 'user',
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

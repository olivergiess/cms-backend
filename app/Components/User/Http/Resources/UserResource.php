<?php

namespace App\Components\User\Http\Resources;

use App\Components\Base\Http\Resources\BaseResource;
use App\Models\User;
use App\Components\Post\Http\Resources\PostCollection;

class UserResource extends BaseResource
{
    public function __construct(User $resource)
    {
        parent::__construct($resource);
    }

    protected $relations = [
    	'posts' => PostCollection::class
	];

    protected function structure()
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'slug'       => $this->slug,
        ];
    }
}

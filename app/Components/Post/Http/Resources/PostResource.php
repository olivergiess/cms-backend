<?php

namespace App\Components\Post\Http\Resources;

use App\Components\Base\Http\Resources\BaseResource;
use App\Models\Post;

class PostResource extends BaseResource
{
    public function __construct(Post $resource)
    {
        parent::__construct($resource);
    }

    protected $relations = [
    	'user' => UserResource::class
	];

    protected function structure()
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'body'       => $this->body,
            'publish_at' => $this->publish_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ] ;
    }
}

<?php

namespace App\Components\Post\Http\Resources;

use App\Components\Base\Http\Resources\BaseResource;
use App\Models\Post;
use App\Components\User\Http\Resources\UserResource;

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
            'type'        => 'post',
            'id'          => $this->id,
            'title'       => $this->title,
            'cover_image' => $this->cover_image,
            'body'        => $this->body,
            'publish_at'  => $this->publish_at,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
            'user_id'     => $this->user_id,
        ] ;
    }
}

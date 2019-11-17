<?php

namespace App\Components\Blog\Http\Resources;

use App\Components\Base\Http\Resources\BaseResource;

use App\Models\Blog;
use App\Components\User\Http\Resources\UserResource;
use App\Components\Post\Http\Resources\PostCollection;

class BlogResource extends BaseResource
{
    public function __construct(Blog $resource)
    {
        parent::__construct($resource);
    }

    protected $relations = [
        'user'  => UserResource::class,
        'posts' => PostCollection::class
    ];

    protected function structure()
    {
        return [
            'type'           => 'blog',
            'id'             => $this->id,
            'url_identifier' => $this->url_identifier,
            'name'           => $this->name,
            'cover_image'    => $this->cover_image,
            'about'          => $this->about,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
            'user_id'        => $this->user_id
        ];
    }
}

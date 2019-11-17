<?php

namespace App\Components\Blog\Repositories;

use App\Components\Base\Repositories\EloquentBaseRepository;
use App\Components\Blog\Contracts\Repositories\BlogRepository;

use App\Models\Blog;
use App\Components\Blog\Http\Resources\BlogResource;
use App\Components\Blog\Http\Resources\BlogCollection;

class EloquentBlogRepository extends EloquentBaseRepository implements BlogRepository
{
    public function __construct(Blog $model, BlogResource $resource, BlogCollection $collection)
    {
        parent::__construct($model, $resource, $collection);

        $this->specialExpansions = [
            'published' => [
                'posts' => function ($query) {
                    $query->published();
                }
            ]
        ];
    }

    public function getByURLIdentifier(string $url_identifier)
    {
        $user = $this->model::where('url_identifier', '=', $url_identifier)
            ->with($this->getExpansions())
            ->firstOrFail();

        $result = $this->resource->make($user);

        return $result;
    }
}

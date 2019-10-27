<?php

namespace App\Components\Post\Repositories;

use App\Components\Base\Repositories\EloquentBaseRepository;
use App\Components\Post\Contracts\Repositories\PostRepository;

use App\Models\Post;
use App\Components\Post\Http\Resources\PostResource;
use App\Components\Post\Http\Resources\PostCollection;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{
    public function __construct(Post $model, PostResource $resource, PostCollection $collection)
    {
        parent::__construct($model, $resource, $collection);
    }

    public function published(int $id)
    {
        $post = $this->model::with($this->expansions)
            ->published()
            ->findOrFail($id);

        $result = $this->resource->make($post);

        return $result;
    }
}

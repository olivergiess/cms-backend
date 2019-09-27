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

    public function published(array $where = [])
    {
        $models = $this->model::published()->where($where)->with($this->expansions)->get();

		$result = $this->collection->make($models);

		return $result;
    }
}

<?php

namespace App\Components\Post\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Post\Contracts\Repositories\PostRepository;

class PublishedPostController extends BaseController
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(string $slug)
    {
        $posts = $this->repository->published($slug);

        return $posts;
    }

    public function show(string $slug, int $id)
    {
        $post = $this->repository->published($slug, ['id' => $id]);

        return $post;
    }
}

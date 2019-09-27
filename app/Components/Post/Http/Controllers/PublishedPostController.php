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

    public function all()
    {
        $posts = $this->repository->published();

        return $posts;
    }

    public function show(int $id)
    {
        $post = $this->repository->published(['id' => $id]);

        return $post;
    }
}

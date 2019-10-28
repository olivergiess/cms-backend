<?php

namespace App\Components\Post\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Post\Contracts\Repositories\PostRepository;
use App\Http\Traits\Expandable;
use Illuminate\Http\Request;

class PublishedController extends BaseController
{
    use Expandable;

    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(Request $request)
    {
        $this->expand($request, $this->repository);

        $posts = $this->repository->allPublished();

        return $posts;
    }

    public function show(int $id, Request $request)
    {
        $this->expand($request, $this->repository);

        $post = $this->repository->showPublished($id);

        return $post;
    }
}

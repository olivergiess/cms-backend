<?php

namespace App\Components\Post\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Post\Contracts\Repositories\PostRepository;
use Illuminate\Http\Request;

class PublishedController extends BaseController
{
    protected $repository;

    public function __construct(Request $request, PostRepository $repository)
    {
        $this->repository = $repository;

        $this->allowedExpansions = ['user'];

        parent::__construct($request);
    }

    public function all(Request $request)
    {
        $posts = $this->repository->allPublished();

        return $posts;
    }

    public function show(int $id, Request $request)
    {
        $post = $this->repository->showPublished($id);

        return $post;
    }
}

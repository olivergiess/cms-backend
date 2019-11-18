<?php

namespace App\Components\Post\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Post\Contracts\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Components\Post\Http\Requests\PostStoreRequest;
use App\Components\Post\Http\Requests\PostUpdateRequest;

class PostController extends BaseController
{
    public function __construct(Request $request, PostRepository $repository)
    {
        $this->repository = $repository;

        $this->allowedExpansions = [
            'blog',
            'blog.user'
        ];

        $this->allowedFilters = [
            'blog.user.id'
        ];

        parent::__construct($request);
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();

        $post = $this->repository->create($data);

        return $post;
    }

    public function show(int $id)
    {
        $post = $this->repository->show($id);

        return $post;
    }

    public function all(Request $request)
    {
        $user_id = $request->user()->id;

        $this->repository->setFilters([
            'blog.user.id' => $user_id
        ]);

        $posts = $this->repository->all();

        return $posts;
    }

    public function update(int $id, PostUpdateRequest $request)
    {
        $data = $request->validated();

        $post = $this->repository->update($id, $data);

        return $post;
    }

    public function delete(int $id)
    {
        $result = $this->repository->delete($id);

        return $result;
    }
}

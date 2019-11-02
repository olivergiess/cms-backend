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

        parent::__construct($request);
    }

    public function all(Request $request)
    {
        $user_id = $request->user()->id;

        $posts = $this->repository->all(['user_id' => $user_id]);

        return $posts;
    }

    public function show(int $id)
    {
        $post = $this->repository->show($id);

        return $post;
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = $request->user()->id;

        $post = $this->repository->create($data);

        return $post;
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

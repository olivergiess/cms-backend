<?php

namespace App\Components\Blog\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Blog\Contracts\Repositories\BlogRepository;
use App\Components\Blog\Http\Requests\BlogStoreRequest;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function __construct(Request $request, BlogRepository $repository)
    {
        $this->repository = $repository;

        $this->allowedExpansions = [
            'user',
            'published'
        ];

        $this->allowedFilters = [
            'user.id'
        ];

        parent::__construct($request);

        $user_id = $request->user()->id;

        $this->repository->setFilters([
            'user.id' => $user_id
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = $request->user()->id;

        $blog = $this->repository->create($data);

        return $blog;
    }

    public function show(int $id)
    {
        $blog = $this->repository->show($id);

        return $blog;
    }

    public function all(Request $request)
    {
        $user_id = $request->user()->id;

        $blogs = $this->repository->all(['user_id' => $user_id]);

        return $blogs;
    }

    public function update(int $id, BlogUpdateRequest $request)
    {
        $data = $request->validated();

        $blog = $this->repository->update($id, $data);

        return $blog;
    }

    public function delete(int $id)
    {
        $result = $this->repository->delete($id);

        return $result;
    }
}

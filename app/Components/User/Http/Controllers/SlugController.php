<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use App\Components\User\Contracts\Repositories\UserRepository;

class SlugController extends BaseController
{
    public function __construct(Request $request, UserRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct($request);
    }

    public function show(string $slug)
    {
        return $this->repository->getBySlug($slug);
    }
}

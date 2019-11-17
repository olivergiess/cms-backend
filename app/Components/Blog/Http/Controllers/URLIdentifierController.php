<?php

namespace App\Components\Blog\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use App\Components\Blog\Contracts\Repositories\BlogRepository;

class URLIdentifierController extends BaseController
{
    public function __construct(Request $request, BlogRepository $repository)
    {
        $this->repository = $repository;

        $this->allowedExpansions = [
            'user',
            'published'
        ];

        parent::__construct($request);
    }

    public function show(string $slug)
    {
        return $this->repository->getByURLIdentifier($slug);
    }
}

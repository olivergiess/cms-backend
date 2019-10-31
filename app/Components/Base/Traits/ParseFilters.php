<?php

namespace App\Components\Base\Traits;

use Illuminate\Http\Request;
use App\Components\Base\Contracts\Traits\HandleFilters;

trait ParseFilters
{
    protected $filterName = 'filter';

    protected $allowedFilters = [];

    public function parseFilters(Request $request, HandleFilters $repository)
    {
        $this->repository->allowFilters($this->allowedFilters);

        $filters = $this->retrieveFilters($request);

        $repository->storeFilters($filters);
    }

    private function retrieveFilters(Request $request)
    {
        return $request->input($this->filterName);
    }
}

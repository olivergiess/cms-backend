<?php

namespace App\Components\Base\Traits;

use Illuminate\Http\Request;
use App\Components\Base\Contracts\Traits\HandleFilters;

trait ParseFilters
{
    protected $filterName = 'filter';

    protected $allowedFilters = [];

    public function parseFilters(Request $request, HandleFilters $repository) : void
    {
        $this->repository->allowFilters($this->allowedFilters);

        $filters = $this->retrieveFilters($request);

        $repository->storeFilters($filters);
    }

    private function retrieveFilters(Request $request) : array
    {
        $filterValue = $request->input($this->filterName);

        return $filterValue
            ? $filterValue
            : [];
    }
}

<?php

namespace App\Components\Base\Traits;

use Illuminate\Http\Request;
use App\Components\Base\Contracts\Traits\HandleExpansions;

trait ParseExpansions
{
    protected $expandName = 'expand';

    protected $allowedExpansions = [];

    public function parseExpansions(Request $request, HandleExpansions $repository)
    {
        $this->repository->allowExpansions($this->allowedExpansions);

        $expansions = $this->retrieveExpansions($request);

        if($expansions)
            $repository->storeExpansions($expansions);
    }

    private function retrieveExpansions(Request $request)
    {
        $expandValue = $request->input($this->expandName);

        return explode(',', $expandValue);
    }
}

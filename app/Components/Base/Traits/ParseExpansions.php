<?php

namespace App\Components\Base\Traits;

use Illuminate\Http\Request;
use App\Components\Base\Contracts\Traits\HandleExpansions;

trait ParseExpansions
{
    protected $expandName = 'expand';

    protected $allowedExpansions = [];

    public function parseExpansions(Request $request, HandleExpansions $repository) : void
    {
        $this->repository->setAllowedExpansions($this->allowedExpansions);

        $expansions = $this->retrieveExpansions($request);

        $repository->setExpansions($expansions);
    }

    private function retrieveExpansions(Request $request) : array
    {
        $expandValue = $request->input($this->expandName);

        return $expandValue
            ? $this->extractExpansions($expandValue)
            : [];
    }

    private function extractExpansions(string $expansions) : array
    {
        return explode(',', $expansions);
    }
}

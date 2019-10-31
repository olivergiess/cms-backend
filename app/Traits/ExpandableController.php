<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Components\Base\Contracts\Repositories\ExpandableRepository;

trait ExpandableController
{
    protected $allowedExpansions = [];

    public function setupExpansions(Request $request, ExpandableRepository $repository)
    {
        $this->repository->allowExpansions($this->allowedExpansions);

        $this->expand($request, $repository);
    }

    private function expand(Request $request, ExpandableRepository $repository)
    {
        if($expansions = $request->input('expand'))
        {
            $repository->expand($expansions);
        }
    }
}

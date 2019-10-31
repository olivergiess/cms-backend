<?php

namespace App\Components\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Components\Base\Contracts\Http\Controllers\ExpandableController as ExpandableControllerContract;

use App\Traits\ExpandableController;

use Illuminate\Http\Request;

abstract class BaseController extends Controller implements ExpandableControllerContract
{
    use ExpandableController;

	public function __construct(Request $request)
    {
        $this->setupExpansions($request, $this->repository);
    }
}

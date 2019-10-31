<?php

namespace App\Components\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Components\Base\Contracts\Traits\ParseExpansions as ParseExpansionsContract;

use App\Components\Base\Traits\ParseExpansions;

use Illuminate\Http\Request;

abstract class BaseController extends Controller implements ParseExpansionsContract
{
    use ParseExpansions;

    protected $repository;

	public function __construct(Request $request)
    {
        $this->parseExpansions($request, $this->repository);
    }
}

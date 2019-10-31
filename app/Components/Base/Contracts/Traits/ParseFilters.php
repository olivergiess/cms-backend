<?php

namespace App\Components\Base\Contracts\Traits;

use Illuminate\Http\Request;
use App\Components\Base\Contracts\Traits\HandleFilters;

interface ParseFilters
{
	public function parseFilters(Request $request, HandleFilters $repository);
}

<?php

namespace App\Components\Base\Contracts\Traits;

use Illuminate\Http\Request;
use App\Components\Base\Contracts\Traits\HandleExpansions;

interface ParseExpansions
{
	public function parseExpansions(Request $request, HandleExpansions $repository);
}

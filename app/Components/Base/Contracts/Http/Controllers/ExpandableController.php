<?php

namespace App\Components\Base\Contracts\Http\Controllers;

use App\Components\Base\Contracts\Repositories\ExpandableRepository;
use Illuminate\Http\Request;

interface ExpandableController
{
	public function setupExpansions(Request $request, ExpandableRepository $repository);
}

<?php

namespace App\Components\Base\Contracts\Repositories;

interface ExpandableRepository
{
	public function expand(string $expansions);

	public function allowExpansions(array $expansions);
}

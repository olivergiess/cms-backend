<?php

namespace App\Components\Base\Contracts\Traits;

interface HandleExpansions
{
	public function storeExpansions(array $expansions);

	public function allowExpansions(array $expansions);
}

<?php

namespace App\Components\Base\Contracts\Traits;

interface HandleFilters
{
	public function storeFilters(array $filters);

	public function allowFilters(array $filters);
}

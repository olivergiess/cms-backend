<?php

namespace App\Components\Base\Contracts\Traits;

interface HandleFilters
{
	public function setFilters(array $filters) : void;

	public function getFilters() : array;

    public function setAllowedFilters(array $filters) : void;
}

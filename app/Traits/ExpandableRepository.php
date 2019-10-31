<?php

namespace App\Traits;

use Exception;

trait ExpandableRepository
{
	protected $expansions = [];
    protected $allowExpansions = [];

    public function expand(string $expansions)
	{
		$this->expansions = explode(',', $expansions);

		$unregisteredExpansions = array_diff($this->expansions, $this->allowExpansions);

		if(count($unregisteredExpansions))
		    throw new Exception();
	}

	public function allowExpansions(array $expansions)
    {
        $this->allowExpansions = $expansions;
    }
}

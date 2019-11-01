<?php

namespace App\Components\Base\Traits;

use App\Exceptions\InvalidExpansionException;

trait HandleExpansions
{
	protected $expansions = [];
    protected $allowedExpansions = [];

    public function storeExpansions(array $expansions)
    {
		$this->validateExpansions($expansions);

		$this->expansions = $expansions;
	}

	public function allowExpansions(array $expansions)
    {
        $this->allowedExpansions = $expansions;
    }

    private function validateExpansions(array $expansions)
    {
        $invalidExpansions = array_diff($expansions, $this->allowedExpansions);

		if(count($invalidExpansions))
		    throw new InvalidExpansionException();
    }
}

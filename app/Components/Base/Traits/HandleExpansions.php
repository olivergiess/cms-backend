<?php

namespace App\Components\Base\Traits;

use App\Exceptions\InvalidExpansionException;

trait HandleExpansions
{
    private $expansions = [];
    private $allowedExpansions = [];
    protected $specialExpansions = [];

    public function setExpansions(array $expansions) : void
    {
        $this->validateExpansions($expansions);

        $this->expansions = $expansions;
    }

    public function getExpansions() : array
    {
        $expansions = [];

        foreach($this->expansions as $expansion)
        {
            if(key_exists($expansion, $this->specialExpansions))
                $expansions += $this->specialExpansions[$expansion];
            else
                $expansions[] = $expansion;
        }

        return $expansions;
    }

    public function setAllowedExpansions(array $expansions) : void
    {
        $this->allowedExpansions = $expansions;
    }

    private function validateExpansions(array $expansions) : void
    {
        $invalidExpansions = array_diff($expansions, $this->allowedExpansions);

        if (count($invalidExpansions))
            throw new InvalidExpansionException();
    }
}

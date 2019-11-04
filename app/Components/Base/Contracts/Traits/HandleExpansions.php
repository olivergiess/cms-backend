<?php

namespace App\Components\Base\Contracts\Traits;

interface HandleExpansions
{
    public function setExpansions(array $expansions) : void;

    public function getExpansions() : array;

    public function setAllowedExpansions(array $expansions) : void;
}

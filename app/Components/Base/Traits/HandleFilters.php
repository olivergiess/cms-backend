<?php

namespace App\Components\Base\Traits;

use App\Exceptions\InvalidFilterException;

trait HandleFilters
{
	protected $filters = [];
    protected $allowedFilters = [];

    public function storeFilters(array $filters) : void
	{
		$this->validateFilters($filters);

		$this->filters = $filters;
	}

	private function validateFilters(array $filters): void
    {
        foreach($filters as $filter => $value)
            if(!in_array($filter, $this->allowedFilters))
                throw new InvalidFilterException();
    }

	public function allowFilters(array $filters) : void
    {
        $this->allowedFilters = $this->notate($filters);
    }

    /**
     * Notates an array by concatenating each of it's string
     * keys with numerically indexed values.
     */
    private function notate(array $array, string $glue = '.') : array
    {
        $result = [];

        foreach($array as $key => $value)
        {
            if(is_numeric($key))
            {
                $result[] = $value;
                continue;
            }

            if(!is_array($value))
            {
                $result[] = $key.$glue.$value;
                continue;
            }

            foreach($this->notate($value) as $item)
            {
                $result[] = $key.$glue.$item;
            }
        }

        return $result;
    }
}

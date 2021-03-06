<?php

namespace App\Components\Base\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
	public $resource;

    protected $relations = [];

    public function relationships()
	{
		$relationships = false;

		foreach($this->relations as $relation => $resource)
			if($this->resource->relationLoaded($relation))
				$relationships[$relation] = [
				    'data' => new $resource($this->$relation)
                ];

		return $relationships ? [
			'relationships' => $relationships,
		] : [];
	}

	public function toArray($request)
    {
        return $this->structure() + $this->relationships();
    }

    abstract protected function structure();
}

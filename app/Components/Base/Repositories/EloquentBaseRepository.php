<?php

namespace App\Components\Base\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;
use App\Components\Base\Contracts\Traits\HandleExpansions as HandleExpansionsContract;
use App\Components\Base\Contracts\Traits\HandleFilters as HandleFiltersContract;

use App\Components\Base\Traits\HandleExpansions;
use App\Components\Base\Traits\HandleFilters;

use App\Components\Base\Http\Resources\BaseResource;
use App\Components\Base\Http\Resources\BaseCollection;
use App\Models\Base;

abstract class EloquentBaseRepository implements BaseRepository, HandleExpansionsContract, HandleFiltersContract
{
    use HandleExpansions, HandleFilters;

    protected $model;
    protected $resource;
    protected $collection;

    protected $current;

    public function __construct(Base $model, BaseResource $resource, BaseCollection $collection)
    {
        $this->model      = $model;
        $this->resource   = $resource;
        $this->collection = $collection;
    }

    public function create(array $data)
    {
        $model = $this->model->create($data);

        $model->refresh();

        $model->load($this->getExpansions());

        $result = $this->resource->make($model);

        return $result;
    }

    public function show(int $id)
    {
        $model = $this->loadModel($id);

        $result = $this->resource->make($model);

        return $result;
    }

    public function all()
    {
        $models = $this->model
            ::with($this->getExpansions())
            ->filters($this->filters)
            ->get();

        $result = $this->collection->make($models);

        return $result;
    }

    public function update(int $id, array $data)
    {
        $model = $this->loadModel($id)->update($data);

        $model->refresh();

        $result = $this->resource->make($model);

        return $result;
    }

    public function delete(int $id)
    {
        $result = $this->loadModel($id)->delete();

        return $result;
    }

    protected function loadModel(int $id)
    {
        if(!isset($this->current) || $this->current->id !== $id)
        {
            $this->current = $this->model
                ::with($this->getExpansions())
                ->filters($this->getFilters())
                ->findOrFail($id);
        }

        return $this->current;
    }
}

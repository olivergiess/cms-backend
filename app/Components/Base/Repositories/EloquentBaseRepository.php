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

    public function __construct(Base $model, BaseResource $resource, BaseCollection $collection)
    {
        $this->model      = $model;
        $this->resource   = $resource;
        $this->collection = $collection;
    }

    public function all(array $where = [])
    {
        $models = $this->model::where($where)
            ->with($this->getExpansions())
            ->filters($this->filters)
            ->get();

        $result = $this->collection->make($models);

        return $result;
    }

    public function show(int $id)
    {
        $model = $this->model::with($this->getExpansions())
            ->filters($this->getFilters())
            ->findOrFail($id);

        $result = $this->resource->make($model);

        return $result;
    }

    public function create(array $data)
    {
        $model = $this->model->create($data);

        $model->refresh();

        $model->load($this->getExpansions());

        $result = $this->resource->make($model);

        return $result;
    }

    public function update(int $id, array $data)
    {
        $model = $this->model::with($this->getExpansions())
            ->findOrFail($id);

        $model->update($data);

        $model->refresh();

        $result = $this->resource->make($model);

        return $result;
    }

    public function delete(int $id)
    {
        $result = $this->model::findOrFail($id)
            ->delete();

        return $result;
    }
}

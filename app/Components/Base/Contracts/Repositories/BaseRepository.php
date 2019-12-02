<?php

namespace App\Components\Base\Contracts\Repositories;

interface BaseRepository
{
    public function create(array $data);

    public function show(int $id);

    public function all();

    public function update(int $id, array $data);

    public function delete(int $id);
}

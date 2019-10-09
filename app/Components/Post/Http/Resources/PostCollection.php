<?php

namespace App\Components\Post\Http\Resources;

use App\Components\Base\Http\Resources\BaseCollection;

class PostCollection extends BaseCollection
{
    public $collects = 'App\Components\Post\Http\Resources\PostResource';
}

<?php

namespace App\Components\Blog\Http\Resources;

use App\Components\Base\Http\Resources\BaseCollection;

class BlogCollection extends BaseCollection
{
    public $collects = 'App\Components\Blog\Http\Resources\BlogResource';
}

<?php

namespace App\Models;

use App\Traits\FilterQueryScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

abstract class Base extends Model
{
    use SoftDeletes, FilterQueryScope;
}

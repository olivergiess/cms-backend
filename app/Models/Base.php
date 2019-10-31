<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

abstract class Base extends Model
{
    use SoftDeletes;

    public function scopeFilters($query, array $filters)
    {
        foreach($filters as $filter => $value)
        {
            $fieldExists = strrpos($filter, '.');

            if($fieldExists === FALSE)
            {
                $query->where($filter, $value);

                continue;
            }

            $relationship = substr($filter, 0, $fieldExists);
            $field = substr($filter, $fieldExists + 1);

            $query->whereHas($relationship, function ($query) use ($field, $value) {
                return $query->where($field, $value);
            });
        }

        return $query;
    }
}

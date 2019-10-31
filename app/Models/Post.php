<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Base
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'publish_at',
        'user_id'
    ];

    public function scopePublished($query)
    {
        return $query->where('publish_at', '<=', Carbon::now()->toDateTimeString());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Base
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'cover_image',
        'body',
        'publish_at',
        'blog_id'
    ];

    public function scopePublished($query)
    {
        return $query
            ->where('publish_at', '<=', Carbon::now()->toDateTimeString())
            ->orderBy('publish_at', 'DESC');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}

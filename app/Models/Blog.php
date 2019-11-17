<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Base
{
    use SoftDeletes;

    protected $fillable = [
        'url_identifier',
        'name',
        'cover_image',
        'about',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts ()
    {
        return $this->hasMany(Post::class);
    }
}

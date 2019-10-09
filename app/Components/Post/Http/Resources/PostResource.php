<?php

namespace App\Components\Post\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Post;

class PostResource extends JsonResource
{
    public function __construct(Post $resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'body'       => $this->body,
            'publish_at' => $this->publish_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

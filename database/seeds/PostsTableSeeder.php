<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $posts = factory(App\Models\Post::class, 10)->create();
    }
}

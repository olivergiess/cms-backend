<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        $blog = factory(App\Models\Blog::class)->create([
            'url_identifier' => 'test'
        ]);
    }
}

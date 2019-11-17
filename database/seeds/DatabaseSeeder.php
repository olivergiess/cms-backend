<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $blog  = factory(App\Models\Blog::class)->create();
        $posts = factory(App\Models\Post::class, 100)->create();
    }
}

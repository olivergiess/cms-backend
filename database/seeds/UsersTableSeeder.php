<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = factory(App\Models\User::class)->create([
            'email' => 'test@test.com'
        ]);
    }
}

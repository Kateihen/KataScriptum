<?php

use Illuminate\Database\Seeder;
use App\{User, Post};

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 20)->create()->each(function ($user) {
            $user->posts()->save(factory(Post::class)->make());
        });

    }
}

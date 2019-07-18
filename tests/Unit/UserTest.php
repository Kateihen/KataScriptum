<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\{ Post, User };

class UserTest extends TestCase
{
     /** @test **/
     function user_can_have_few_post() {
        $testUser = factory(User::class)->create();

        $testPost1 = factory(Post::class)->make();
        $testPost2 = factory(Post::class)->make();

        $testUser->posts()->save($testPost1);
        $testUser->posts()->save($testPost2);

        $this->assertEquals($testPost1->author, $testUser->name);
        $this->assertEquals($testPost2->author, $testUser->name);
     }
}

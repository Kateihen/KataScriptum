<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\{User, Post};

class PostsFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    function guests_may_not_create_a_post() {
        $this->get('posts/create')->assertRedirect('login');
    }

    /** @test **/
    function user_can_create_a_post() {
        $user1 = factory(User::class)->create();
        $this->actingAs($user1)->post('posts', [        
            'title' => 'TestTitle',
            'author' => $user1->name,
            'post_body' => 'TestPostBody'        
        ]);

        $this->assertDatabaseHas('posts', ['title' => 'TestTitle']);
    }  
    
    /** @test **/    
    function user_can_edit_their_post() {
        $user2 = factory(User::class)->create();
        $this->actingAs($user2)->post('posts', [
            'title' => 'TestTitle',
            'author' => $user2->name,
            'post_body' => 'TestPostBody'
        ]);
        
        $this->actingAs($user2)->get('/posts/2/edit')->assertOk();
    }

    /** @test **/
    function user_cannot_edit_other_posts() {
        $user3 = factory(User::class)->create();
        $this->actingAs($user3)->post('posts', [
            'title' => 'TestTitle1',
            'author' => $user3->name,
            'post_body' => 'TestPostBody'
        ]);

        $user4 = factory(User::class)->create();
        $this->actingAs($user4)->post('posts', [
            'title' => 'TestTitle2',
            'author' => $user4->name,
            'post_body' => 'TestPostBody'
        ]);

        $this->actingAs($user4)->get('/posts/3/edit')->assertForbidden();
    }

    /** @test **/
    function users_can_delete_their_posts() {
        $this->withoutExceptionHandling();

        $user5 = factory(User::class)->create();
        $this->actingAs($user5)->post('posts', [
            'title' => 'TestTitle',
            'author' => $user5->name,
            'post_body' => 'TestPostBody'
        ]);
        
        $this->actingAs($user5)->delete('/posts/5')->assertRedirect('posts');        
    }

    /** @test **/
    function users_cannot_delete_other_posts() {
        $user6 = factory(User::class)->create();
        $this->actingAs($user6)->post('posts', [
            'title' => 'TestTitle1',
            'author' => $user6->name,
            'post_body' => 'TestPostBody'
        ]);

        $user7 = factory(User::class)->create();
        $this->actingAs($user7)->post('posts', [
            'title' => 'TestTitle2',
            'author' => $user7->name,
            'post_body' => 'TestPostBody'
        ]);

        $this->actingAs($user7)->delete('/posts/6')->assertForbidden();
    }
}
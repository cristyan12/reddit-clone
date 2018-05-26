<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsControllerTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function a_guest_can_see_all_the_posts()
    {
    	// Arrange
    	$posts = factory(\App\Post::class, 10)->create();

    	// Act
    	$response = $this->get('/');

    	// Assert
    	$response->assertStatus(200);
    	foreach ($posts as $post) {
    		$response->assertSee($post->title);
    	}
    }

    /** @test */
    public function a_registered_user_can_see_all_the_posts()
    {
        // Arrange
        $user = factory(\App\User::class)->create();

        $this->userSignIn($user);

        $posts = factory(\App\Post::class, 10)->create();

        // Act
        $response = $this->get(route('home'));

        // Assert
        $response->assertStatus(200);
        foreach ($posts as $post) {
            $response->assertSee($post->title);
        }
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WriteCommentTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function a_registered_user_can_write_a_comment()
    {
        // Arrange
        $this->actingAs($user = $this->defaultUser());
        $post = $this->createPost();

        // Act
        $response = $this->post(route('comments.store', $post->id), [
            'comment' => 'Un comentario',
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);

        // Assert 
        $this->assertDatabaseHas('comments', [
            'comment' => 'Un comentario',
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);
    }

    /** @test */
    public function it_see_all_the_comments()
    {
        // $this->withoutExceptionHandling();
        
        // Arrange
        $post = $this->createPost();

        // Act
        $this->actingAs($user = $this->defaultUser());

        $this->post(route('comments.store', $post->id), [
            'comment' => 'Me gusta este post',
            'post_id' => $post->id,
            'user_id' => $user->id
        ]);

        $response = $this->get(route('posts.show', $post->id));

        // Assert 
        $response->assertStatus(200)
            ->assertSee('Me gusta este post');
    }
}

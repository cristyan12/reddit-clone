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
        $this->withoutExceptionHandling();

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
}

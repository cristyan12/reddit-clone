<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function post_determines_its_author()
	{
		// Having
		$user = $this->defaultUser();
		$post = factory(\App\Post::class)->create([
			'user_id' => $user->id
		]);

		$postByAnotherUser = factory(\App\Post::class)->create();

		// Then
		$postByAuthor = $post->wasCreatedBy($user);
		$postByAnotherUser = $postByAnotherUser->wasCreatedBy($user);

		// Assert
		$this->assertTrue($postByAuthor);
		$this->assertFalse($postByAnotherUser);
	}

	/** @test */
	public function post_determines_its_author_if_null_return_false()
	{
		// Having
		$post = factory(\App\Post::class)->create();

		// Then
		$postByAuthor = $post->wasCreatedBy(null);

		// Assert
		$this->assertFalse($postByAuthor);
	}
}

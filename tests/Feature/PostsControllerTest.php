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
    		$response->assertSee(e($post->title));
    	}
    }

    /** @test */
    public function a_registered_user_can_see_all_the_posts()
    {
        // Arrange
        $this->actingAs($user = $this->defaultUser());

        $posts = factory(\App\Post::class, 10)->create();

        // Act
        $response = $this->get(route('home'));

        // Assert
        $response->assertStatus(200);
        foreach ($posts as $post) {
            $response->assertSee(e($post->title));
        }
    }

    /** @test */
    public function a_guest_can_see_all_the_posts_and_its_authors()
    {
        // Arrange
        $this->actingAs($user = $this->defaultUser());

        $posts = factory(\App\Post::class, 10)->create();

        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        foreach ($posts as $post) {
            $response->assertSee(e($post->title));
            $response->assertSee(e($post->user->name));
        }
    }

    /** @test */
    public function a_guest_can_see_a_details_post()
    {
        $this->withoutExceptionHandling();
        
        // Arrange
        $post = factory(\App\Post::class)->create([
            'title' => 'Titulo',
            'description' => 'Description',
            'url' => 'http://yahoo.com'
        ]);

        // Act
        $response = $this->get(route('posts.show', [
            'post' => $post->id
        ]));

        // Assert
        $response->assertStatus(200)
            ->assertSee('Titulo')
            ->assertSee('Description')
            ->assertSee('http://yahoo.com');
    }

    /** @test */
    public function a_guest_cannot_see_the_creation_form()
    {
        // Act
        $response = $this->get(route('posts.create'))
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_guest_cannot_create_posts()
    {
        // Act
        $response = $this->post(route('posts.store'));

        // Assert
        $response->assertRedirect('/login');
    }

    /** @test */
    public function a_registered_user_can_create_posts()
    {
        // Arrange
        $this->actingAs($user = $this->defaultUser([
            'name' => 'Cristyan Valera'
        ]));

        // Act
        $response = $this->post(route('posts.store'), [
        	'title' => 'Title',
        	'description' => 'Description',
        	'url' => 'http://google.com',
        ]);

        // Assert
        $post = \App\Post::first();
        $this->assertSame($post->count(), 1);
        $this->assertSame($user->id, $post->user_id);
    }

    /** @test */
    public function only_author_can_edit_post()
    {
        // Arrange
        $user = $this->defaultUser();
        $post = $this->createPost(['user_id' => $user->id]);
        
        $this->actingAs($user);

        // Act
        $response = $this->put(route('posts.update', ['post' => $post->id]), [
            'title' => 'editado',
            'description' => 'editado',
            'url' => 'http://google.com'
        ]);

        // Assert
        $post = \App\Post::first();
        $this->assertSame($post->title, 'editado');
        $this->assertSame($post->description, 'editado');
        $this->assertSame($post->url, 'http://google.com');
    }

    /** @test */
    public function if_not_author_cannot_edit_post()
    {
        // Arrange
        $post = $this->createPost();
        $this->actingAs($user = $this->defaultUser());

        // Act
        $response = $this->put(route('posts.update', ['post' => $post->id]), [
            'title' => 'editado',
            'description' => 'editado',
            'url' => 'http://google.com'
        ]);

        // Assert
        $post = \App\Post::first();
        $this->assertNotSame($post->title, 'editado');
        $this->assertNotSame($post->description, 'editado');
        $this->assertNotSame($post->url, 'http://google.com');
    }

    /** @test */
    public function only_author_can_delete_posts()
    {
        // Arrange
        $user = $this->defaultUser();
        $post = $this->createPost(['user_id' => $user->id]);

        $this->actingAs($user);
        
        // Act
        $this->delete(route('posts.delete', ['post' => $post->id]));

        $response = $this->get('/');

        // Assert
        $response->assertDontSee($post->title);

        $post = $post->fresh();
        $this->assertNull($post);
    }

     /** @test */
    public function if_not_author_cannot_delete_posts()
    {
        // Arrange
        $post = $this->createPost();

        $this->actingAs($user = $this->defaultUser());
        
        // Act
        $this->delete(route('posts.delete', ['post' => $post->id]));


        // Assert
        $response = $this->get('/')
            ->assertSee($post->title);

        $post = $post->fresh();
        $this->assertNotNull($post);
    }
}

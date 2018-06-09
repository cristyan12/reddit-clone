<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_show_all_the_post_of_user_admin()
    {
        // Arrange
        $this->actingAs($user = $this->defaultUser([
            'name' => 'Cristyan Valera'
        ]));

        $posts = $this->createPost([
            'title' => 'Decir adios!',
            'user_id' => $user->id
        ]);

        // Act
        $response = $this->get('/dashboard');

        // Assert
        $response->assertStatus(200)
            ->assertSee('Decir adios!');
    }
}

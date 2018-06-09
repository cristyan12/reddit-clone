<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

	protected $defaultUser;

	public function defaultUser(array $attributes = [])
    {
        if ($this->defaultUser) {
            return $this->defaultUser;
        }
        return $this->defaultUser = factory(\App\User::class)->create($attributes);
    }

    public function createPost(array $attributes = [])
    {
        return factory(\App\Post::class)->create($attributes);
    }
}

<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

	protected $defaultUser;
    
    public function userSignIn($user)
    {
    	\Auth::loginUsingId($user->id);
    }

	public function defaultUser(array $attributes = [])
    {
        if ($this->defaultUser) {
            return $this->defaultUser;
        }
        return $this->defaultUser = factory(\App\User::class)->create();
    }

    public function createPost($number = null, array $attributes = [])
    {
        return factory(\App\Post::class, $number)->create($attributes);
    }
}

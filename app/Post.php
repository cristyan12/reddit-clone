<?php

namespace App;

Use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'url'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wasCreatedBy($user)
    {
    	if (is_null($user)) {
    		return false;
    	}
    	
    	return $this->user_id === $user->id;
    }

    public function titleToSlug()
    {
        $this->title = Str::slug($this->title);
    }

    public function getSlugAttribute()
    {
        return route('posts.show', [$this->id, $this->titleToSlug()]);
    }
}

<?php

namespace App;

Use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'url'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

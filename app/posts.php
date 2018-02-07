<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
	// Added to allow the only fields to update by post method. (MisAssignment exception)
    protected $fillable = ['title', 'content', 'front', 'user_id'];

    // Inverse of fillable, add the fields, which should not exposed to the user.
    //protected $guarded = []

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
    	$this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id()
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

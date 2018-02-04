<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
	// Added to allow the only fields to update by post method. (MisAssignment exception)
    protected $fillable = ['title', 'content', 'front'];

    // Inverse of fillable, add the fields, which should not exposed to the user.
    //protected $guarded = []
}

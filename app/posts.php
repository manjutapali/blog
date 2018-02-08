<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public static function archives()
    {
        
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*)')
        ->groupBy('month', 'year')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();

        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Filtering the posts based on month & year. (archives)
    public function scopeFilter($query, $filter) 
    {
        if($month = $filter['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filter['year'])
        {
            $query->whereYear('created_at', $year);
        }
    }
}

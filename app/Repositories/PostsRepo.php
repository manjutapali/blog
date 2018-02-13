<?php

namespace App\Repositories;

use App\posts;


class PostsRepo
{
	public function all()
	{
		return posts::all();
	}
}

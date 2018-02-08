<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\posts;

class ExampleTest extends TestCase
{

	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $first = factory(posts::class)->create();

        $second = factory(posts::class)->create([
        	'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        $posts = posts::archives();

        //dd($posts);

        $this->assertEquals([
        	[
        		"year" => $first->created_at->year,
    			"month" => $first->created_at->format('F'),
    			"count(*)" => 1
        	],
        	[
        		"year" => $second->created_at->year,
    			"month" => $second->created_at->format('F'),
    			"count(*)" => 1
        	]
        ], $posts);
    }

}

<?php

namespace Tests\Feature;

use Hoda\Movies\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListMoviesApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        Parent::setUp();
        factory(Movie::class)->create();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiScucceded()
    {
        $response = $this->get('/api/v1/movies');

        $response->assertStatus(200)->assertJsonStructure([
            "data"=>[
              [  "id" ,
                "adult",
                "backdrop_path" ,
                "third_party_id" ,
                "popularity" ,
                "poster_path",
                "release_date",
                "title",
                "vote_average",
                "vote_count",
                "created_at",
                "updated_at",
           ]
            ]]);
        $this->assertCount(1, $response->json()['data']);
    }
}

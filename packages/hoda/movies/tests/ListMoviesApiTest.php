<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListMoviesApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdiSucceed()
    {
        $response = $this->get('/api/v1/movies');
        dd($response);

        $response->assertStatus(200);
    }
}

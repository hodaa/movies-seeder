<?php

namespace Tests\Unit;

use Hoda\Movies\Repositories\Repository;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RepositoryFetchMethodTest extends TestCase
{
    private $repo;

    public function setUp(): void
    {
        parent::setUp();
        $this->repo = new Repository();
    }

    /**
     *
     */
    public function testFetch()
    {
        Http::fake();
        $response= $this->repo->fetch('/fake');
        $this->assertNull($response);
    }
}

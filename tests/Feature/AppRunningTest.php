<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppRunningTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testServerResponse()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

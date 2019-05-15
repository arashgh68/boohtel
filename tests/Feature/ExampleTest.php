<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testNewClientFrom()
    {
        $response = $this->get('clients/new');
        $response->assertStatus(200);
    }
    public function testProfessorHas()
    {
        $response = $this->get('clients/new');
        $this->assertContains('Mr.',$response->getContent(),'no find professor');
    }
}

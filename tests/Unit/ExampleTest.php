<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Title;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /*public function testTitlesModelCount()
    {
        $title = new Title;
        $this->assertTrue(count($title->all())===6,"Count must be 6");
    }
    public function testLastTitlesProfessor()
    {
        $title = new Title;
        $titles_arr = $title->all();
        $this->assertEquals('Professor',array_pop($titles_arr),'the last element is not professor');
    }*/
}

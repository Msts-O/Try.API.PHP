<?php

namespace Tests\Feature;

require_once("vendor/autoload.php");
use App\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoRegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_MakingTest()  //testは最初にtestを頭文字につけて行う
    {
        $response = $this->post('api/todos',[
            'memo' => 'test'
        ]);

        $response -> assertStatus(200);
    }
}

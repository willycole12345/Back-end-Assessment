<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_externalbooks()
    {
        $response = $this->get('/api/v1/external-books',['name'=>'A Game of Thrones']);

        $response->assertStatus(200);
    }

    public function test_create(){
        $response= $this->post('/api/v1/create',[
                'name' => 'william cole',
                'isbn' => 'isbn-123567',
                'authors' => 'Oreoluw',
                'number_of_page' => '2330',
                'publisher' => 'Oreoluwa',
                'country' => 'Nigeria',
                'release_date' => '2020-11-20'
        ]);
        $response
        ->assertStatus(200);
    }
    public function test_Getbook(){
        $response= $this->get('/api/v1/Getbook');
        $response->assertStatus(200);
    }

    public function test_Upadtebook(){
        $response= $this->patch('/api/v1/Update/2',[
            'name' => 'william cole',
            'isbn' => 'isbn-123567',
            'authors' => 'Oreoluw',
            'number_of_page' => '50000',
            'publisher' => 'Oreoluwa',
            'country' => 'Togo',
            'release_date' => '2020-11-10'
    ]);
        $response->assertStatus(200);
    }
    public function test_Deletebook(){
        $response= $this->delete('/api/v1/Delete/2');
        $response->assertStatus(200);
    }
    public function test_DeletebookPost(){
        $response= $this->post('/api/v1/Deletebook/10/delete');
        $response->assertStatus(200);
    }
    public function test_showbook(){
        $response= $this->get('/api/v1/show/5');
        $response->assertStatus(200);
    }
}
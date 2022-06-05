<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function asset_landing_page_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function asset_page_sees_questions()
    {
        $questions = 
        [   
            [
                'q' => 'You’re really busy at work and a colleague is telling you their life story and personal woes. You:',
                'a' => [
                    1 => 'Don’t dare to interrupt them,intro',
                    2 => 'Think it’s more important to give them some of your time; work can wait,extro',
                    3 => 'Listen, but with only with half an ear,intro',
                    4 => 'Interrupt and explain that you are really busy at the moment,extro'
                ],

            ],
        ];

        $view = $this->view('welcome',['questions' => $questions]);

        $view->assertSee('You’re really busy at work and a colleague is telling you their life story and personal woes. You:');
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function asset_result_page_gets_a_successful_response()
    {
        $response = $this->post('/triats',[
            'trait-1' => 'intro',
            'trait-2' => 'extro',
            'trait-3' => 'extro',
            'trait-4' => 'intro',
            'trait-5' => 'intro',
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function asset_result_page_sees_desired_result()
    {
        $response = $this->post('/triats',[
            'trait-1' => 'intro',
            'trait-2' => 'extro',
            'trait-3' => 'extro',
            'trait-4' => 'intro',
            'trait-5' => 'intro',
        ]);

        $view = $this->view('results',['result' => 'intro']);

        $response->assertStatus(200);
        $view->assertSee('intro');
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_should_successfully_create_a_lead(): void
    {
       $response =  $this->postJson(route('leads.store'), [
            'title' => 'Test Lead',
            'description' => 'Test Description',
            ]);

       $response->assertCreated();
       $this->assertDatabaseHas('leads', [
            'title' => 'Test Lead',
            'description' => 'Test Description',
            ]);
    }

    public function test_it_should_return_error_when_required_field_is_missing(): void
    {
        $lead = $this->postJson(route('leads.store'), [
            'title' => '',
            'description' => '',]);

        $lead -> assertUnprocessable();
    }
}

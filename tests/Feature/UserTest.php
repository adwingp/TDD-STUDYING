<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;

class UserTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test  */
    public function addExample(){
        $this->withoutExceptionHandling();

        $response = $this->post('addcustomer',[
            'name' => 'Justin',
            'email' => 'adwingp@gmail.com'
        ]);

        $response->assertOk();
        $response->assertStatus(200);
    }

    /** @test  */
    public function testValidationExample(){

        $response = $this->post('addcustomer',[
            'name' => '',
            'email' => ''
        ]);

        $response->assertSessionHasErrors('name', 'email');
    }

    /** @test  */
    public function testEditByIdExample(){
        $response = $this->get('editcustomer/1');
        $response->assertStatus(200);
    }

    /** @test  */
    public function testUpdateByIdExample(){
        $this->withoutExceptionHandling();

        $customer = Customer::find(3);
        // dd($customer);
        $response = $this->patch('updatecustomer/'.$customer->id,[
            'name' => 'Rohith',
            'email' => 'Rohith@gmail.com'
        ]);
        $response->assertStatus(200);
    }
}

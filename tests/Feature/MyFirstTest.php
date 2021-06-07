<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyFirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_admin_customers_feedback()
    {
        $response = $this->get('admin/customers/feedback');

        $response->assertStatus(200);
    }

    public function test_admin_customers_order()
    {
        $response = $this->get('/admin/customers/order');

        $response->assertStatus(200);
    }


    public function test_welcome()
    {
        $response = $this->get('/welcome');

        $response->assertStatus(200);
    }



    public function test_news_create()
    {
        $response = $this->get(route('news.create'));

        $response->assertStatus(200);
    }

    public function test_order_store()
    {
        $data1 = [
            'customername' => 'ExampleCustomerTest',
            'telephonenumber' => '8888888888',
            'email' => 'example@example.com',
            'information' => 'example many information about this'
        ];

        $response = $this->post(route('admin.customers.order.store'), $data1);

        $response->assertJson($data1);
    }

}

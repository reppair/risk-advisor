<?php

use App\Models\Customer;
use App\Models\Product;

beforeEach(function () {
    $this->artisan('db:seed', ['--class' => 'ProductsTableSeeder']);

    $this->enquiryData = [
        'name' => 'Martin Blagoev',
        'email' => 'mb.reppair@gmail.com',
        'phone' => '+359894390903',
        'address' => 'Sofia, Bulgaria, 1000',
        'contact_preference' => 'email',
        'product_ids' => Product::pluck('id')->toArray(),
        'message' => 'No rush!',
    ];
});

it('has validates input', function () {
    $response = $this->post(route('enquiries.store'), ['message' => 1]);

    $response->assertSessionHasErrors([
        'name',
        'email',
        'phone',
        'address',
        'contact_preference',
        'product_ids',
        'message',
    ]);

    $response->assertStatus(302);

    $this->artisan('db:seed', ['--class' => 'ProductsTableSeeder']);

    $response = $this->post(route('enquiries.store'), $this->enquiryData);

    $response->assertSessionDoesntHaveErrors()
        ->assertRedirect('/')
        ->assertSessionHas('message');
});

it('will store an enquiry', function () {
    $this->post(route('enquiries.store'), $this->enquiryData);

    expect(Customer::first())
        ->name->toBe($this->enquiryData['name'])
        ->email->toBe($this->enquiryData['email'])
        ->phone->toBe($this->enquiryData['phone'])
        ->address->toBe($this->enquiryData['address'])
        ->contact_preference->toBe($this->enquiryData['contact_preference'])
        ->enquiries->toHaveCount(1)
        ->enquiries->first()->products->toHaveCount(3);
});

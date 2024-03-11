<?php

use App\Models\Product;

it('has validates input', function () {
    $response = $this->post(route('enquiries.store'), ['message' => 1]);

    $response->assertSessionHasErrors(['name', 'email', 'phone', 'address', 'product_ids', 'message']);

    $response->assertStatus(302);

    $this->artisan('db:seed', ['--class' => 'ProductsTableSeeder']);

    $response = $this->post(route('enquiries.store'), [
        'name' => 'Martin Blagoev',
        'email' => 'mb.reppair@gmail.com',
        'phone' => '+359894390903',
        'address' => 'Sofia, Bulgaria, 1000',
        'product_ids' => Product::pluck('id')->toArray(),
    ]);

    $response->assertSessionDoesntHaveErrors()->assertOk();
});

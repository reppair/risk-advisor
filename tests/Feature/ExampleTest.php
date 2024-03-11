<?php

use App\Models\Product;
use Inertia\Testing\AssertableInertia;

it('returns a successful response', function () {
    $this->artisan('db:seed', ['--class' => 'ProductsTableSeeder']);

    $response = $this->get('/');

    $products = Product::select(['id', 'name', 'description'])->get();

    $response
        ->assertStatus(200)
        ->assertInertia(fn (AssertableInertia $page) =>
            $page->component('Welcome')
                ->has('products', $products->count())
                ->where('products', $products->toArray())
        );
});

<?php

use App\Enum\ContactPreference;
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
                ->where('products', $products->toArray())
                ->where('contact_preference_options', ContactPreference::valuesToArray())
        );
});

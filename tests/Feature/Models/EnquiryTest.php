<?php

use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

it('can be created via factory', fn () =>
    expect(Enquiry::factory()->create())
        ->message->toBeString()
        ->exists->toBeTrue()
);

it('belongs to a customer', function () {
    $enquiry = Enquiry::factory()->create();

    expect($enquiry->customer())->toBeInstanceOf(BelongsTo::class)
        ->and($enquiry->customer->toArray())->toEqual(Customer::first()->toArray());
});

it('belongs to many products', function () {
    $enquiry = Enquiry::factory()
        ->has(Product::factory()->count(2))
        ->create();

    expect($enquiry->products())->toBeInstanceOf(BelongsToMany::class)
        ->and($enquiry->products)->toHaveCount(2);
});

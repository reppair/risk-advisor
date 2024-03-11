<?php

use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

it('can be created via factory', fn () =>
    expect(Product::factory()->create())
        ->name->toBeString()
        ->description->toBeString()
        ->exists->toBeTrue()
);

it('belongs to many enquiries', function () {

    $product = Product::factory()
        ->has(
            Enquiry::factory(2)
                ->recycle(Customer::factory()->create()))
        ->create();

    expect($product->enquiries())->toBeInstanceOf(BelongsToMany::class)
        ->and($product->enquiries)->toHaveCount(2);
});

<?php

use App\Enum\ContactPreference;
use App\Models\Customer;
use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('can be created via factory', fn () =>
    expect(Customer::factory()->create())
        ->name->toBeString()
        ->email->toBeString()
        ->email->toBeString()
        ->phone->toBeString()
        ->address->toBeString()
        ->contact_preference->toBeIn(ContactPreference::valuesToArray())
        ->exists->toBeTrue()
);

it('has many enquires', function () {
    $customer = Customer::factory()->create();

    Enquiry::factory(2)->recycle($customer)->create();

    expect($customer->enquiries())->toBeInstanceOf(HasMany::class)
        ->and($customer->enquiries)->toHaveCount(2);
});

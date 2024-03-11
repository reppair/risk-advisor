<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public array $products = [
        'Home' => 'Your current home.',
        'Auto' => 'Your current vehicle(s).',
        'Recreational Vehicle' => 'Your boat, RV, side-by-side etc.',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $type = $this->faker->randomElement(array_keys($this->products)),
            'description' => $this->products[$type],
        ];
    }
}

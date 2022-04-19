<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExchangeQuote>
 */
class ExchangeQuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'exchange_rate' => $this->faker->numberBetween(10, 500)/100,
            'surcharge_percentage' => 3,
            'discount_percentage' => 0,
            'send_email' => false,
        ];
    }
}

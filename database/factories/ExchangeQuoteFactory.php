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
        $currency_code = $this->faker->unique()->currencyCode();
        return [
            'key' => 'USD'.strtoupper($currency_code),
            'currency_code' =>  $currency_code,
            'exchange_rate' => $this->faker->numberBetween(10, 500)/100,
            'surcharge_percentage' => 3,
            'discount_percentage' => 0,
            'send_email' => false,
        ];
    }
}

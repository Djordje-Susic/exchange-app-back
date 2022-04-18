<?php

namespace App\Services;

use App\Models\ExchangeQuote;
use App\Models\Order;

class OrderService {

    /**
     * Stores Order model to database.
     *
     * @param ExchangeQuote $exchangeQuote
     * @param float $amount
     *
     * @return \App\Models\Order
     */
    public static function store(ExchangeQuote $exchangeQuote, float $amount): Order {
        $order = new Order();

        // currency_code
        $order->currency_code = $exchangeQuote->currency_code;
        // exchange_rate
        $order->exchange_rate = $exchangeQuote->exchange_rate;
        // surcharge_percentage
        $order->surcharge_percentage = $exchangeQuote->surcharge_percentage;
        // discount_percentage
        $order->discount_percentage = $exchangeQuote->discount_percentage;
        // amount_purchased
        $order->amount_purchased = $amount;

        $basicPrice = $order->exchange_rate * $amount;

        // surcharge_amount
        $order->surcharge_amount = $basicPrice * ($order->surcharge_percentage / 100);

        // discount_amount
        $order->discount_amount = $basicPrice * (1 + $order->surcharge_percentage / 100) * ($order->discount_percentage / 100);

        // amount_paid
        $order->amount_paid = $exchangeQuote->quote * $amount;

        $order->save();

        return $order;
    }
}

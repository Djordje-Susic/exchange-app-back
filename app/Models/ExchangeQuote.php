<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeQuote extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'send_email',
        'updated_at',
        'created_at',
        'exchange_rate',
        'surcharge_percentage'

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'quote',
    ];

    public function getQuoteAttribute(){
        $quote =
            $this->exchange_rate
            // Apply surcharge
            * (1 + $this->surcharge_percentage / 100)
            // Apply discount
            * (1 - $this->discount_percentage / 100);

        return round($quote, 6);
    }
}

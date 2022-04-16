<?php

namespace App\Services;

use App\Contracts\FetchExternalQuotesContract;
use Illuminate\Support\Facades\Http;

class FetchCurrencylayerQuotesService implements FetchExternalQuotesContract {

    public function fetch(): object{
        $response = Http::get('http://api.currencylayer.com/live', [
                'access_key' => config('currencylayer.access_key'),
                'format' => 1,
            ]
        );

        $quotes = json_decode($response->body())->quotes;

        return $quotes;
    }

}

<?php

namespace App\Services;

use App\Facades\FetchExternalQuotesFacade;
use App\Models\ExchangeQuote;
use Illuminate\Support\Collection;

class UpdateQuotesService {

    public static function update(): Collection {
        $quotes = FetchExternalQuotesFacade::fetch();

        $dbQuotes = ExchangeQuote::all();

        $dbQuotes->each(function($qoute) use ($quotes){
            $key = $qoute->key;
            if(!isset($quotes->$key)){
                throw new \Exception('Key is missing.');
            }
            $qoute->exchange_rate = $quotes->$key;
            $qoute->save();
        });

        return $dbQuotes;
    }

}

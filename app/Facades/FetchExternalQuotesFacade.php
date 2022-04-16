<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection fetch();
 */
class FetchExternalQuotesFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'App\Contracts\FetchExternalQuotesContract';
    }
}

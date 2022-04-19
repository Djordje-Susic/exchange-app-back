<?php

namespace Tests\Feature;

use App\Services\FetchCurrencylayerQuotesService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchCurrencylayerQuotesServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testQuoteFetch()
    {
        Http::fake(function (Request $request) {
            return Http::response([
                'quotes' => [
                    'USDJPY' => 126.465501,
                    'USDGBP' => 0.76497,
                    'USDEUR' => 0.92485
                ]
            ], 200);
        });

        $quotes = (new FetchCurrencylayerQuotesService())->fetch();

        $this->assertTrue(is_object($quotes));
        $this->assertTrue(isset($quotes->USDJPY));
        $this->assertEquals($quotes->USDJPY, 126.465501);
        $this->assertTrue(isset($quotes->USDGBP));
        $this->assertEquals($quotes->USDGBP, 0.76497);
        $this->assertTrue(isset($quotes->USDEUR));
        $this->assertEquals($quotes->USDEUR, 0.92485);
    }
}

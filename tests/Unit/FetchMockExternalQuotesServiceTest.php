<?php

namespace Tests\Unit;

use App\Services\FetchMockExternalQuotesService;
use PHPUnit\Framework\TestCase;

class FetchMockExternalQuotesServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQuoteFetch()
    {
        $quotes = (new FetchMockExternalQuotesService())->fetch();

        $this->assertTrue(is_object($quotes));
        $this->assertTrue(isset($quotes->USDJPY));
        $this->assertEquals($quotes->USDJPY, 126.465501);
        $this->assertTrue(isset($quotes->USDGBP));
        $this->assertEquals($quotes->USDGBP, 0.76497);
        $this->assertTrue(isset($quotes->USDEUR));
        $this->assertEquals($quotes->USDEUR, 0.92485);
    }
}

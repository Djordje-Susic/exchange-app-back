<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExchangeQuote;
use App\Traits\ApiResponser;

class ExchangeQuoteController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = ExchangeQuote::all();
        return $this->successResponse($quotes);
    }
}

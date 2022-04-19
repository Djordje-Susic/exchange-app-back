<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Models\ExchangeQuote;
use App\Models\Order;
use App\Services\OrderService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'key' => 'required|string|exists:App\Models\ExchangeQuote,key',
            'amount' => 'required|numeric|gt:0',
            'quote' => 'required|numeric',
        ]);

        $exchangeQuote = ExchangeQuote::where('key', $data['key'])->firstOrFail();

        if(strval($exchangeQuote->quote) !== strval($data['quote'])) {
            throw ValidationException::withMessages(['quote' => 'quote mismatch']);
        }

        $order = OrderService::store($exchangeQuote, $data['amount']);

        event(new OrderCreated($order, $exchangeQuote->send_email));

        return $this->successResponse($order);
    }
}

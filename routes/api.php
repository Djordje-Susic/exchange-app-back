<?php

use App\Http\Controllers\ExchangeQuoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('quotes', ExchangeQuoteController::class, ['only' => ['index']]);

Route::name('fetch')->post('fetch', [FetchController::class, 'fetch']);

Route::resource('orders', OrderController::class, ['only' => ['index', 'store']]);

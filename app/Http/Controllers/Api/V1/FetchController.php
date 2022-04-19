<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\UpdateQuotesService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    use ApiResponser;

    public function fetch(){
        $quotes = UpdateQuotesService::update();

        return $this->successResponse($quotes);
    }
}

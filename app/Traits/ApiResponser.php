<?php

namespace App\Traits;

trait ApiResponser
{
	protected function successResponse($data, $code=200)
	{
		return response()->json(['status'=>'success', 'data'=>$data], $code);
	}

	protected function failResponse($message, $code)
	{
		return response()->json(['status'=>'fail', 'error' => $message], $code);
	}

	protected function errorResponse($message, $code)
	{
		return response()->json(['status'=>'error', 'message' => $message], $code);
	}
}

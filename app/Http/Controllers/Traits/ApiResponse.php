<?php

namespace App\Http\Controllers\Traits;
use Illuminate\Http\Response;

trait ApiResponse
{
    function noContentresponse($data = []){
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }

}

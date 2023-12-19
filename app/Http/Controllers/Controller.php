<?php

namespace App\Http\Controllers;

use ApiResponse;
use App\Http\Controllers\Traits\ApiResponse as TraitsApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, TraitsApiResponse;
}

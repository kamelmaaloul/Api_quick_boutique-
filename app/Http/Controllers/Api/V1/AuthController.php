<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Resources\Api\V1\AuthResource;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Resources\Api\V1\UserResource;
use App\Services\UserService;
//use GuzzleHttp\Psr7\Response;


class AuthController extends Controller
{
    private UserService $userService;
    function __construct(UserService $userService){
        $this->userService=$userService;
    }

        /**
     *Register
     */
    public function register(RegisterRequest $request)
    {
        $userData = $this->userService->register($request->validated());

        return AuthResource::make($userData);
    }

    /**
     *Login
     */ 

    public function login(LoginRequest $request)
    {
        $data = $this->userService->login($request->validated());
        if(!$data){
            return response()->json([
                'message'  => __('Invalid Credentials')
            ], Response::HTTP_UNAUTHORIZED);
        }
        return AuthResource::make($data);
    }

    /**
     *Logout
     */

    public function logout()
    {
        $this->userService->logout();
        return response()->json([],204) ;

    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\UserRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    
    private UserService $userService;
    function __construct(UserService $userService){
        $this->userService=$userService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::paginate();

        return UserResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $userData = $this->userService->create($request->validated());

        return UserResource::make($userData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $order
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return UserResource::make($user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $user)
    {

        $item_user =$this->userService->update($user, $request->validated());
        return UserResource::make($item_user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = $this->userService->delete($user);
        return $this->noContentresponse();

    }
}

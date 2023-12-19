<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\orderRequest;
use App\Models\order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Http\Resources\Api\V1\orderResource;
use App\Services\orderService;

class OrderController extends Controller
{
    
    private orderService $orderService;
    function __construct(orderService $orderService){
        $this->orderService=$orderService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = order::paginate();

        return orderResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(orderRequest $request)
    {
        $orderData = $this->orderService->create($request->validated());

        return orderResource::make($orderData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return orderResource::make($order);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(orderRequest $request, $order)
    {

        $item_order =$this->orderService->update($order, $request->validated());
        return orderResource::make($item_order);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        $order = $this->orderService->delete($order);
        return $this->noContentresponse();

    }
}

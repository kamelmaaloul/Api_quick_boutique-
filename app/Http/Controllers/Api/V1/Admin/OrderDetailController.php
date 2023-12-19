<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\OrderDetailRequest;
use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Http\Resources\Api\V1\OrderDetailResource;
use App\Services\OrderDetailService;

class OrderDetailController extends Controller
{
    
    private OrderDetailService $OrderDetailService;
    function __construct(OrderDetailService $OrderDetailService){
        $this->OrderDetailService=$OrderDetailService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = OrderDetail::paginate();

        return OrderDetailResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderDetailRequest $request)
    {
        $OrderDetailData = $this->OrderDetailService->create($request->validated());

        return OrderDetailResource::make($OrderDetailData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $order
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $OrderDetail)
    {
        return OrderDetailResource::make($OrderDetail);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderDetailRequest  $request
     * @param  \App\Models\OrderDetail  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderDetailRequest $request, $OrderDetail)
    {

        $item_OrderDetail =$this->OrderDetailService->update($OrderDetail, $request->validated());
        return OrderDetailResource::make($item_OrderDetail);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $OrderDetail)
    {
        $OrderDetail = $this->OrderDetailService->delete($OrderDetail);
        return $this->noContentresponse();

    }
}

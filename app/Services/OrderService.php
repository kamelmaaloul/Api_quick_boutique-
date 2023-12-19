<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    /*
    * cretae new Order
    * @var array $data
    *@return Order
    */
    
    public function create(array $data) :Order
    {
        $order = new Order();
        $order->fill($data);
        $order->save();

        return $order;        
    }

    public function update(int|Order $order, array $data):Order 
    {
        if(!($order instanceof Order)){
            $order = Order::findOrFail($order);
        }
        $order->fill($data);
        $order->save();
        
        return $order;
        
    }

    public function delete(int|Order $order):bool
     {
        if(!($order instanceof Order)){
            $order = Order::findOrFail($order);
        }
        $order->delete();
        return true;        
    }

    
}

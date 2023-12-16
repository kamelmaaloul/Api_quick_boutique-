<?php

namespace App\Services;

use App\Models\Order;

class OrderSevice
{
    public function create($data) {
        $order = new Order();
        $order->fill($data);
        $order->save();

        return $order;
        
    }

    public function update($id,$data) {
        $order = Order::findOrFail($id);
        $order->fill($data);
        $order->save();

        return $order;
        
    }

    public function delete($id) {
        $order = Order::findOrFail($id);
        $order->delete();

        return true;

        
    }
}

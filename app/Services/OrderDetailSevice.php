<?php

namespace App\Services;

use App\Models\OrderDetail;

class OrderDetailSevice
{
    public function create($data) {
        $orderdetail = new OrderDetail();
        $orderdetail->fill($data);
        $orderdetail->save();

        return $orderdetail;
        
    }

    public function update($id,$data) {
        $orderdetail = OrderDetail::findOrFail($id);
        $orderdetail->fill($data);
        $orderdetail->save();

        return $orderdetail;
        
    }

    public function delete($id) {
        $orderdetail = OrderDetail::findOrFail($id);
        $orderdetail->delete();

        return true;

        
    }
}

<?php

namespace App\Services;

use App\Models\OrderDetail;

class OrderDetailService
{
    /*
    * cretae new OrderDetail
    * @var array $data
    *@return OrderDetail
    */
    
    public function create(array $data) :OrderDetail
    {
        $orderdetail = new OrderDetail();
        $orderdetail->fill($data);
        $orderdetail->save();

        return $orderdetail;        
    }

    public function update(int|OrderDetail $orderdetail, array $data):OrderDetail 
    {
        if(!($orderdetail instanceof OrderDetail)){
            $orderdetail = OrderDetail::findOrFail($orderdetail);
        }
        $orderdetail->fill($data);
        $orderdetail->save();
        
        return $orderdetail;
        
    }

    public function delete(int|OrderDetail $orderdetail):bool
     {
        if(!($orderdetail instanceof OrderDetail)){
            $orderdetail = OrderDetail::findOrFail($orderdetail);
        }
        $orderdetail->delete();
        return true;        
    }

}

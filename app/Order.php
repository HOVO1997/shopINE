<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    public function allPrice()
    {
        $sum = 0;
        foreach ($this->products as $prod) {
            $sum += $prod->getAllcount();
        }
        return $sum;
    }

    public function confirmOrder($name,$phone){
        if($this->status == 0 ){
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }else{
            return false;
        }
    }

}

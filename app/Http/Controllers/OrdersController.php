<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orders(){

        $orders = Order::where('status',1)->get();

        return view('auth.orders.index',compact('orders'));


    }
}

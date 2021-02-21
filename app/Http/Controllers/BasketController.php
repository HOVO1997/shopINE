<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;


class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        } else {
            session()->flash('warning', 'Your basket is empty!');
            return redirect()->route('index');
        }
        return view('basket', compact('order'));
    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        if (Order::find($orderId)->allPrice() == 0) {
            session()->flash('warning', 'Basket is empty');
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));

    }

    public function basketAdd($id)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($id)) {
            $pivotRow = $order->products()->where('product_id', $id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($id);
        }
        $product = Product::find($id);

        session()->flash('success', $product->name . ' added into basket');

        return redirect()->route('basket');

    }

    public function basketRemove($id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($id)) {
            $pivotRow = $order->products()->where('product_id', $id)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        $product = Product::find($id);
        session()->flash('warning', $product->name . ' removed from basket');

        return redirect()->route('basket');
    }

    public function basketConfirm(Request $request)
    {
        
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->confirmOrder($request->name, $request->phone);
        if ($success) {
            session()->flash('success', 'Your order is confirmed!');
        } else {
            session()->flash('warning', 'Warning!');
        }

        return redirect()->route('index');
    }
}

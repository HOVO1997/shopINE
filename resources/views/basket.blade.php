@extends('layouts.layout')

@section('title','Basket')

@section('content')

<div style="width: 100%">
    <div class="text-center">
            <h1>Basket</h1>
            <p>Confirm orders</p>
    </div>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>All price</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order->products as $orderItem)
                    <tr>
                        <td>
                            <a href="{{ route('product',[$orderItem->category->code, $orderItem->code]) }}">
                                <img height="56px" alt="asd"
                                     src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg">
                               {{ $orderItem->name }}
                            </a>
                        </td>
                        <td><span class="badge">{{ $orderItem->pivot->count }}</span>
                            <div class="btn-group form-inline">
                                <form action="{{ route('basket-remove',$orderItem->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true">-</span></button>
                                </form>
                                <form action="{{ route('basket-add',$orderItem->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success"
                                            href=""><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $orderItem->price }} $</td>
                        <td>{{ $orderItem->getAllcount($orderItem->pivot->count) }} $</td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="3">All products price:</td>
                        <td>{{ $order->allPrice() }} $</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group right" style="float: right" role="group">
                    <a type="button" class="btn btn-success " href="{{ route('basket-place') }}">Confirm
                        order</a>
                </div>
            </div>
</div>

@endsection

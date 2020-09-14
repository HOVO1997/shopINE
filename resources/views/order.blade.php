@extends('layouts.layout')

@section('title','All Categories')

@section('content')


    <form style="width: 50%;" method="POST" action="{{ route('basket-confirm') }}">
        @csrf
        <div class="text-center">
            <h1>Confirm order:</h1>
            <p>All prirce: <b>{{ $order->allPrice() }} $</b></p>
            <p>Write your name and phone number, so that our manager can contact you:</p>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone number</label>
            <input type="number" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Buy</button>
        </div>
    </form>


@endsection

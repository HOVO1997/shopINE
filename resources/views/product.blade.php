@extends('layouts.layout')
@section('content')
    <div class="text-center">
        <h1>{{ $product->name }}</h1>
        <h2>{{ $category }}</h2>
        <p>Price: <b>{{ $product->price }} $.</b></p>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" style="width: 70%">
        <p>{{ $product->description }}</p>
        <form action="{{ route('basket-add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success" role="button">To basket</button>
        </form>
    </div>

@endsection

@extends('layouts.layout')

@section('title','Main Page')

@section('content')
<div class="text-center">
    <div class="text-center">
        <h1>All Products</h1>
    </div>
    <div class="row">
        @foreach($products as $product)
            @include('card',compact('product'))
        @endforeach
    </div>
</div>
@endsection

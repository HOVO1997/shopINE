@extends('layouts.layout')

@section('title', $category->name)


@section('content')

<div class="text-center">
            <h1>
                {{ $category->name }}    {{ $category->products->count() }}
            </h1>
            <p>
                {{ $category->description }}
            </p>
</div>

            <div class="row">
                @foreach($category->products as $product)
                    @include('card',compact('product'))
                @endforeach
            </div>


@endsection

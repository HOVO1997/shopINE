@extends('layouts.layout')

@section('title','All Categories')

@section('content')

    <div class="text-center">
        @foreach($categories as $category)

            <div class="card mb-3" style="width: 18rem;">
                <a href="{{ route('category',$category->code)  }}">
                    <div>
                        <img class="card-img-top w-25 "
                             src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg"
                             alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h2>{{ $category->name }}</h2>
                        <p class="card-text"> {{ $category->description }}</p>
                    </div>
                </a>
            </div>

        @endforeach
    </div>

@endsection

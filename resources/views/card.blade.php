<div class="col-sm-4 mb-5">
    <div class="card">
        <img class="card-img-top" src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg"
             alt="Card image cap">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p>{{ $product->price }}.$</p>
            <p>{{ $product->category->name }}</p>
            <form action="{{ route('basket-add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary" role="button">To basket</button>
                <a href="{{ route('product',[$product->category->code,$product->code]) }}"
                   class="btn btn-info text-white"
                   role="button">More</a>
            </form>
        </div>
    </div>
</div>




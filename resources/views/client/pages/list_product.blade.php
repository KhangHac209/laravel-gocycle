@extends('client.layout.master')
@section('content')
    {{-- <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="brand">
                        <h2>Brand Products</h2>
                        <form id="filter-form">
                            <ul class="option">
                                <li><a
                                        href="{{ route('products.index', ['brand' => 'All Products', 'min_price' => request('min_price'), 'max_price' => request('max_price')]) }}">All
                                        Products</a></li>
                                @foreach ($brands as $brand)
                                    <li><a
                                            href="{{ route('products.index', ['brand' => $brand->brand, 'min_price' => request('min_price'), 'max_price' => request('max_price')]) }}">{{ $brand->brand }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </form>
                    </div>
                    <div class="brand">
                        <h2>Price</h2>
                        <ul class="option">
                            <li><a
                                    href="{{ route('products.index', ['brand' => request('brand'), 'min_price' => 0, 'max_price' => 100]) }}">0
                                    - 100 $</a></li>
                            <li><a
                                    href="{{ route('products.index', ['brand' => request('brand'), 'min_price' => 100, 'max_price' => 200]) }}">100
                                    $ - 200 $</a></li>
                            <li><a
                                    href="{{ route('products.index', ['brand' => request('brand'), 'min_price' => 200, 'max_price' => 300]) }}">200
                                    $ - 300 $</a></li>
                            <li><a
                                    href="{{ route('products.index', ['brand' => request('brand'), 'min_price' => 300, 'max_price' => 400]) }}">300
                                    $ - 400 $</a></li>
                            <li><a
                                    href="{{ route('products.index', ['brand' => request('brand'), 'min_price' => 400, 'max_price' => 500]) }}">400
                                    $ - 500 $</a></li>
                            <li><a
                                    href="{{ route('products.index', ['brand' => request('brand'), 'min_price' => 500, 'max_price' => 100000]) }}">500
                                    $ - 100000 $</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <h4>{{ request('brand') ?? 'All Products' }}</h4>
                        @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ $product->thumb }}" class="card-img-top" alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->brand }}</p>
                                        <p class="card-text">${{ $product->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

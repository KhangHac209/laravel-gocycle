@extends('client.layout.master')

@section('content')
    <div class="products">
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
                                            href="{{ route('products.index', ['brand' => $brand->name, 'min_price' => request('min_price'), 'max_price' => request('max_price')]) }}">{{ $brand->name }}</a>
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
                            <div class="card-product col-md-4">
                                <a href="{{ url('/detail/' . $product->id) }}">
                                    <div class="thumb">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                                        @if ($product->discount === 30)
                                            <div class="sale">{{ $product->discount }}%</div>
                                        @endif
                                    </div>
                                    <div class="title">
                                        <h3>{{ $product->productCategory->name }}</h3>
                                        <h2>{{ $product->name }}</h2>
                                    </div>
                                    <p class="price">
                                        <span
                                            class="{{ $product->discount !== 0 ? 'priceOld' : '' }}">{{ $product->price }}.00
                                            $</span>
                                        @if ($product->discount !== 0)
                                            <span
                                                class="priceDiscount">{{ number_format($product->price - $product->price * ($product->discount / 100), 2) }}
                                                $</span>
                                        @endif
                                    </p>
                                </a>
                            </div>
                        @endforeach
                        <div class="per-page">
                            @include('components.paginationProduct')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function filterProducts(brand) {
            $.ajax({
                url: '{{ route('products.index') }}',
                type: 'GET',
                data: {
                    brand: brand,
                    min_price: '{{ request('min_price') }}',
                    max_price: '{{ request('max_price') }}'
                },
                success: function(response) {
                    $('#product-list').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        function filterByPrice(minPrice, maxPrice) {
            $.ajax({
                url: '{{ route('products.index') }}',
                type: 'GET',
                data: {
                    brand: '{{ request('brand') }}',
                    min_price: minPrice,
                    max_price: maxPrice
                },
                success: function(response) {
                    $('#product-list').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
@endsection

@extends('client.layout.master')

@section('content')
    <div class="listSearch">
        <div class="container">
            <div class="title">
                <h3>List Product</h3>
                <h2>Search: {{ $keySearch }}</h2>
            </div>
            <div class="row">
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card-product">
                                <a href="{{ url('/detail/' . $product->id) }}">
                                    <div class="thumb">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" />
                                        @if ($product->discount === 30)
                                            <div class="sale">{{ $product->discount }}%</div>
                                        @endif
                                    </div>
                                    <div class="title">
                                        {{-- <h3>{{ $product->productCategory->name }}</h3> --}}
                                        <h2>{{ $product->name }}</h2>
                                    </div>
                                    <p class="price">
                                        <span
                                            class="{{ $product->discount !== 0 ? 'priceOld' : '' }}">{{ $product->price }}.00
                                            $</span>
                                        <span>
                                            @if ($product->discount !== 0)
                                                <div class="priceDiscount">
                                                    {{ number_format($product->price - $product->price * ($product->discount / 100), 2) }}
                                                    $
                                                </div>
                                            @endif
                                        </span>
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p>No products found for the search: {{ $keySearch }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

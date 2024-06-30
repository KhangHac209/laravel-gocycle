<div class="col">
    @foreach ($datas as $products)
        <a href="{{ url('/detail/' . $products->id) }}" class="card-product pe-3">
            <div class="thumb">
                <img src="{{ $products->image_url }}" alt="{{ $products->name }}" />
                @if ($products->discount === 30)
                    <div class="sale">{{ $products->discount }}%</div>
                @endif
            </div>
            <div class="title">
                <h3>{{ $products->productCategory->name }}</h3>
                <h2>{{ $products->name }}</h2>
            </div>
            <p class="price">
                <span class="{{ $products->discount !== 0 ? 'priceOld' : '' }}">{{ $products->price }}.00 $</span>
                <span>
                    @if ($products->discount !== 0)
                        <div class="priceDiscount">
                            {{ number_format($products->price - $products->price * ($products->discount / 100), 2) }} $
                        </div>
                    @endif
                </span>
            </p>
        </a>
    @endforeach
</div>

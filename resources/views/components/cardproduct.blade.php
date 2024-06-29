<div class="col">
    <a href="{{ url('/detail/' . $id) }}" class="card-product pe-3">
        <div class="thumb">
            <img src="{{ $thumb }}" alt="" />
            @if ($discount === 30)
                <div class="sale">{{ $discount }}%</div>
            @endif
        </div>
        <div class="title">
            <h3>{{ $brand }}</h3>
            <h2>{{ $name }}</h2>
        </div>
        <p class="price">
            <span class="{{ $discount !== 0 ? 'priceOld' : '' }}">{{ $price }}.00 $</span>
            <span>
                @if ($discount !== 0)
                    <div class="priceDiscount">{{ $price - $price * ($discount / 100) }}.00 $</div>
                @endif
            </span>
        </p>
    </a>
</div>

<div class="container">
    @include('components.Title', ['sub' => 'Our Products', 'title' => 'All Products'])
    <div class="slider-container">
        <div class="product-slider">
            @foreach ($datas as $product)
                <div class="card-product">
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
                            <span class="{{ $product->discount !== 0 ? 'priceOld' : '' }}">{{ $product->price }}.00
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
        </div>
    </div>

    @include('components.Title', ['sub' => 'Sale Off 30%', 'title' => 'Sale Products'])
    <div class="slider-container">
        <div class="sale-slider">
            @foreach ($datas as $product)
                @if ($product->discount !== 0)
                    <div class="card-product">
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
                @endif
            @endforeach
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('.product-slider').slick({
            infinite: true,
            speed: 700,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            cssEase: "linear",
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('.sale-slider').slick({
            infinite: true,
            speed: 700,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            cssEase: "linear",
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>

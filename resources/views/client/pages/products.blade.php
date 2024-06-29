<div class="container">
    <h2>Our Products</h2>
    <div class="slider-container">
        <div class="product-slider">
            @foreach ($products as $product)
                <div class="card-product">
                    <a href="{{ url('/product/' . $product['id']) }}">
                        <div class="thumb">
                            <img src="{{ $product['image_url'] }}" alt="">
                            @if ($product['discount'] === 30)
                                <div class="sale">{{ $product['discount'] }}%</div>
                            @endif
                        </div>
                        <div class="title">
                            <h3>{{ $product['brand'] }}</h3>
                            <h2>{{ $product['name'] }}</h2>
                        </div>
                        <p class="price">
                            <span class="{{ $product['discount'] !== 0 ? 'priceOld' : '' }}">{{ $product['price'] }}.00
                                $</span>
                            @if ($product['discount'] !== 0)
                                <span
                                    class="priceDiscount">{{ $product['price'] - $product['price'] * ($product['discount'] / 100) }}.00
                                    $</span>
                            @endif
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <h2>Sale Off 30%</h2>
    <div class="slider-container">
        <div class="sale-slider">
            @foreach ($products as $product)
                @if ($product['discount'] !== 0)
                    <div class="card-product">
                        <a href="{{ url('/product/' . $product['id']) }}">
                            <div class="thumb">
                                <img src="{{ $product['thumb'] }}" alt="">
                                @if ($product['discount'] === 30)
                                    <div class="sale">{{ $product['discount'] }}%</div>
                                @endif
                            </div>
                            <div class="title">
                                <h3>{{ $product['brand'] }}</h3>
                                <h2>{{ $product['name'] }}</h2>
                            </div>
                            <p class="price">
                                <span
                                    class="{{ $product['discount'] !== 0 ? 'priceOld' : '' }}">{{ $product['price'] }}.00
                                    $</span>
                                @if ($product['discount'] !== 0)
                                    <span
                                        class="priceDiscount">{{ $product['price'] - $product['price'] * ($product['discount'] / 100) }}.00
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
            slidesToShow: 4,
            slidesToScroll: 3,
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
            slidesToShow: 4,
            slidesToScroll: 3,
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

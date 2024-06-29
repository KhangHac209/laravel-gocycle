<div class="container">
    @include('components.Title', ['sub' => 'Brand Bicycle', 'title' => 'Popular Products'])
    <ul class="option">
        <li class="choice active" data-brand="Lapierre">Lapierre</li>
        <li class="choice" data-brand="Mondraker">Mondraker</li>
        <li class="choice" data-brand="Cruzee">Cruzee</li>
        <li class="choice" data-brand="Cube">Cube</li>
        <li class="choice" data-brand="Radon">Radon</li>
        <li class="choice" data-brand="Giant">Giant</li>
    </ul>
    {{-- <div class="row" id="product-list">
        @foreach ($products as $product)
            <div class="col-lg-4 product-item" data-brand="{{ $product->brand }}">
                <a href="{{ url('/product/' . $product->id) }}">
                    <div class="thumb">
                        <img src="{{ $product->image_url }}" alt="">
                        @if ($product->discount === 30)
                            <div class="sale">{{ $product->discount }}%</div>
                        @endif
                    </div>
                    <div class="title">
                        <h3>{{ $product->brand }}</h3>
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <p class="price">
                        <span class="{{ $product->discount !== 0 ? 'priceOld' : '' }}">{{ $product->price }}.00 $</span>
                        @if ($product->discount !== 0)
                            <span
                                class="priceDiscount">{{ $product->price - $product->price * ($product->discount / 100) }}.00
                                $</span>
                        @endif
                    </p>
                </a>
            </div>
        @endforeach
    </div> --}}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('.choice').on('click', function() {
            $('.choice').removeClass('active');
            $(this).addClass('active');

            var selectedBrand = $(this).data('brand');
            $('.product-item').hide();
            $('.product-item[data-brand="' + selectedBrand + '"]').show();
        });
    });
</script>

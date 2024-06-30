<div class="container">
    @include('components.Title', ['sub' => 'Brand Bicycle', 'title' => 'Popular Products'])
    <ul class="option">
        <li class="choice active" data-category="Lapierre">Lapierre</li>
        <li class="choice" data-category="Mondraker">Mondraker</li>
        <li class="choice" data-category="Cruzee">Cruzee</li>
        <li class="choice" data-category="Cube">Cube</li>
        <li class="choice" data-category="Radon">Radon</li>
        <li class="choice" data-category="Giant">Giant</li>
    </ul>
    <div class="row" id="product-list">
        @foreach ($datas as $data)
            <div class="col-lg-4 product-item" data-category="{{ $data->productCategory->name }}">
                <div class="card-product">
                    <a href="{{ url('/product/' . $data->id) }}">
                        <div class="thumb">
                            <img src="{{ $data->image_url }}" alt="{{ $data->name }}">
                            @if ($data->discount === 30)
                                <div class="sale">{{ $data->discount }}%</div>
                            @endif
                        </div>
                        <div class="title">
                            <h3>{{ $data->productCategory->name }}</h3>
                            <h2>{{ $data->name }}</h2>
                        </div>
                        <p class="price">
                            <span class="{{ $data->discount !== 0 ? 'priceOld' : '' }}">{{ $data->price }}.00
                                $</span>
                            @if ($data->discount !== 0)
                                <span
                                    class="priceDiscount">{{ number_format($data->price - $data->price * ($data->discount / 100), 2) }}
                                    $</span>
                            @endif
                        </p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Hiển thị mặc định sản phẩm của Lapierre khi trang được tải
        var defaultCategory = 'Lapierre';
        $('.product-item').hide();
        $('.product-item[data-category="' + defaultCategory + '"]').show();

        // Thiết lập active cho mục Lapierre
        $('.choice').removeClass('active');
        $('.choice[data-category="' + defaultCategory + '"]').addClass('active');

        $('.choice').on('click', function() {
            $('.choice').removeClass('active');
            $(this).addClass('active');

            var selectedCategory = $(this).data('category');
            $('.product-item').hide();
            $('.product-item[data-category="' + selectedCategory + '"]').show();
        });
    });
</script>

@extends('client.layout.master')

@section('content')
    <div class="detail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="thumb" src="{{ $product->thumb }}" alt="" />

                    <div class="slider">
                        @foreach ($product->thumb_detail as $item)
                            <img onclick="handlePic('{{ $item }}')" src="{{ $item }}" alt="" />
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title">
                        <h2>{{ $product->name }}</h2>
                        <p class="price">
                            <span class="{{ $product->discount !== 0 ? 'priceOld' : '' }}">{{ $product->price }}.00 $</span>
                            <span>
                                @if ($product->discount !== 0)
                                    <div class="priceDiscount">
                                        {{ $product->price - $product->price * ($product->discount / 100) }}.00 $</div>
                                @endif
                            </span>
                        </p>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="choose">
                        <div class="plus-minus">
                            <i type="minus" onclick="handleChange('minus')" class="fa-solid fa-minus"></i>
                            <input name="quantity" type="text" value="1" />
                            <i type="plus" onclick="handleChange('plus')" class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <button class="clickButton" onclick="handleAddCart()">
                        ADD TO CART
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handlePic(pic) {
            document.querySelector('.thumb').src = pic;
        }

        function handleChange(type) {
            const quantityInput = document.querySelector('input[name="quantity"]');
            let quantity = parseInt(quantityInput.value);
            if (type === 'plus') {
                quantity++;
            } else if (type === 'minus' && quantity > 1) {
                quantity--;
            }
            quantityInput.value = quantity;
        }

        function handleAddCart() {
            alert('Add Cart Successed!');
            // Implement add to cart logic here
        }
    </script>
@endsection

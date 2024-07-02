@extends('client.layout.master')

@section('content')
    <div class="detail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="thumb" src="{{ $product->image_url }}" alt="{{ $product->name }}" />

                    <div class="slider">
                        @foreach ($product->images as $image)
                            <img onclick="handlePic('{{ $image->image_url }}')" src="{{ $image->image_url }}"
                                alt="{{ $product->name }}" />
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title">
                        <h2>{{ $product->name }}</h2>
                        <p class="price">
                            <span class="{{ $product->discount !== 0 ? 'priceOld' : 'false' }}">
                                {{ number_format($product->price, 2) }} $
                            </span>
                            @if ($product->discount !== 0)
                                <span class="priceDiscount">
                                    {{ number_format($product->price - $product->price * ($product->discount / 100), 2) }}
                                    $
                                </span>
                            @endif
                        </p>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="choose">
                        <div class="plus-minus">
                            <i type="minus" onclick="handleChange('minus')" class="fa-solid fa-minus"></i>
                            <input name="quantity" type="text" value="1" readonly />
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
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
            const quantity = document.querySelector('input[name="quantity"]').value;
            const productId = '{{ $product->id }}';

            fetch("{{ route('cart.add') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        productId: productId,
                        qty: quantity
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    Swal.fire('Add To Cart Success!');
                    // Optionally, update UI to indicate successful addition
                    updateCartUI(data); // Function to update cart UI without redirecting
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Please login to continue').then(() => {
                        window.location.href = '{{ route('login') }}';
                    });
                });
        }

        // Function to update cart UI without redirecting
        function updateCartUI(data) {
            const qtyElement = document.getElementById(`qty_${data.productId}`);
            const subtotalElement = document.getElementById(`subtotal_${data.productId}`);
            const totalAmountElement = document.getElementById('totalAmount');

            if (qtyElement && subtotalElement && totalAmountElement) {
                qtyElement.value = data.qty;
                subtotalElement.textContent = `${data.subtotal}.00 $`;
                totalAmountElement.textContent = `${data.total}.00 $`;
            }
        }

        $(document).ready(function() {
            $('.slider').slick({
                infinite: true,
                slidesToShow: 2, // Number of slides to show at a time
                slidesToScroll: 1, // Number of slides to scroll
                autoplay: true, // Autoplay slider
                autoplaySpeed: 3000, // Autoplay speed (ms)
                arrows: true, // Show navigation arrows
                dots: true, // Show navigation dots
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endsection

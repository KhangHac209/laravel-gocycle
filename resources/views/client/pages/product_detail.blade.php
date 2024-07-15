@extends('client.layout.master')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
                                    {{ number_format($product->price - $product->price * ($product->discount / 100), 2) }} $
                                </span>
                            @endif
                        </p>
                        <p>{{ $product->description }}</p>
                    </div>
                    {{-- <div class="choose">
                        <div class="plus-minus">
                            <i type="minus" onclick="handleChange('minus')" class="fa-solid fa-minus"></i>
                            <input name="quantity" type="text" value="1" readonly />
                            <i type="plus" onclick="handleChange('plus')" class="fa-solid fa-plus"></i>
                        </div>
                    </div> --}}
                    <button class="clickButton" onclick="handleAddCart()">
                        ADD TO CART
                    </button>
                    <div class="parameter">
                        <table>
                            <tr>
                                <th>Attribute</th>
                                <th>Value</th>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td style="color: red">{{ $product->productCategory->name }}</td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>25,8 kg</td>
                            </tr>

                            <tr>
                                <td>Chain</td>
                                <td>Shimano CN-M6100</td>
                            </tr>
                            <tr>
                                <td>Max. support</td>
                                <td>30 km/h</td>
                            </tr>
                            <tr>
                                <td>Frame Size</td>
                                <td>48 cm</td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td>Aluminium</td>
                            </tr>
                            <tr>
                                <td>Torque</td>
                                <td>&lt;50 Nm</td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td>Gray</td>
                            </tr>
                        </table>
                    </div>
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
                    updateCartUI(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Please login to continue').then(() => {
                        window.location.href = '{{ route('login') }}';
                    });
                });
        }

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
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: true,
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

@extends('client.layout.master')
@section('content')
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table id="table_cart">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $productId => $item)
                                    <tr id="tr-{{ $productId }}">
                                        <td class="shoping__cart__item">
                                            <img src="img/cart/cart-1.jpg" alt="">
                                            <h5>{{ $item['name'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{ number_format($item['price'], 2) }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div data-add-qty="{{ route('cart.add.product.item', ['productId' => $productId]) }}"
                                                    class="pro-qty">
                                                    <input type="text" value="{{ $item['qty'] }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            ${{ number_format($item['price'] * $item['qty'], 2) }}
                                        </td>
                                        <td data-delete-item="{{ route('cart.delete.item.cart', ['productId' => $productId]) }}"
                                            data-product-id="{{ $productId }}" class="shoping__cart__item__close">
                                            <span class="icon_close"></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right btn-delete-cart"><span
                                class="icon_loading"></span>
                            Delete Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            @php $totalPrice=0; @endphp
                            @foreach ($cart as $productId => $item)
                                @php
                                    $totalPrice += $item['price'] * $item['qty'];
                                @endphp
                            @endforeach
                            <li>Subtotal <span id="subtotalAmount">${{ number_format($totalPrice, 2) }}</span></li>
                            <li>Total <span id="totalAmount">${{ number_format($totalPrice, 2) }}</span></li>
                        </ul>
                        <a href="{{ route('cart.checkout') }}" class="clickButton">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

@section('my-script')
    <script type="text/javascript">
        $(document).ready(function(event) {
            $('.btn-delete-cart').on('click', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '{{ route('cart.destroy') }}',
                    type: 'GET',
                    success: function(response) {
                        $('#table_cart').empty();
                        Swal.fire(response.message);
                    }
                })
            });

            // Update quantity in the cart
            $('.pro-qty input').on('change', function() {
                var qty = $(this).val();
                var url = $(this).parent().data('add-qty');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        qty: qty,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        updateCartUI(response);
                        Swal.fire(response.message);
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire('Failed to update cart.');
                    }
                });
            });

            // Delete item from cart
            $('.shoping__cart__item__close').on('click', function() {
                var productId = $(this).data('product-id');
                var url = $(this).data('delete-item');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#tr-' + productId).remove();
                        updateCartUI(response);
                        Swal.fire(response.message);
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire('Failed to remove item.');
                    }
                });
            });

            // Function to update cart UI
            function updateCartUI(data) {
                $('#subtotalAmount').text('$' + data.subtotal.toFixed(2));
                $('#totalAmount').text('$' + data.total.toFixed(2));
                $.each(data.items, function(productId, item) {
                    var row = $('#tr-' + productId);
                    row.find('.shoping__cart__quantity input').val(item.qty);
                    row.find('.shoping__cart__total').text('$' + (item.qty * item.price).toFixed(2));
                });
            }
        });
    </script>
@endsection

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
            $('.qtybtn').on('click', function() {
                var btn = $(this);
                var qty = parseInt(btn.siblings('input').val());
                if (btn.hasClass('inc')) {
                    qty += 1;
                } else if (btn.hasClass('dec')) {
                    qty -= 1;
                }

                var url = btn.parent().data('add-qty');
                url += "/" + qty;
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        var productId = btn.parent().data('product-id');
                        if (qty === 0) {
                            $('#tr-' + productId).empty();
                        } else {
                            Swal.fire(response.message);
                        }
                    }
                });
            })
            $('.shoping__cart__item__close').on('click', function() {
                var productId = $(this).data('product-id');
                var url = $(this).data('delete-item')
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        $('#tr-' + productId).empty();

                        Swal.fire(response.message);
                    }
                })
            });



            // function updateCartTotal(subtotal, total) {
            //     $('#subtotalAmount').text('$' + subtotal.toFixed(2));
            //     $('#totalAmount').text('$' + total.toFixed(2));
            // }
        });
    </script>
@endsection

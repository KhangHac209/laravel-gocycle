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
                    <div class="shoping__continue">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span id="subtotalAmount">${{ number_format($subtotal, 2) }}</span></li>
                            <li>Total <span id="totalAmount">${{ number_format($total, 2) }}</span></li>
                        </ul>
                        <a href="" class="clickButton">PROCEED TO CHECKOUT</a>
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
                        $('#table_cart tbody').empty();
                        $('#subtotalAmount').text('$0.00');
                        $('#totalAmount').text('$0.00');
                        Swal.fire(response.message);
                    }
                });
            });

            $('.shoping__cart__item__close').on('click', function() {
                var productId = $(this).data('product-id');
                var url = $(this).data('delete-item');
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(response) {
                        $('#tr-' + productId).remove();
                        updateCartTotal(response.subtotal, response.total);
                        Swal.fire(response.message);
                    }
                });
            });

            $('.pro-qty input').on('change', function() {
                var qty = $(this).val();
                var productId = $(this).closest('div.pro-qty').data('product-id');
                var url = $(this).closest('div.pro-qty').data('add-qty') + '/' + qty;
                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        updateCartTotal(response.subtotal, response.total);
                        Swal.fire(response.message);
                    }
                });
            });

            function updateCartTotal(subtotal, total) {
                $('#subtotalAmount').text('$' + subtotal.toFixed(2));
                $('#totalAmount').text('$' + total.toFixed(2));
            }
        });
    </script>
@endsection

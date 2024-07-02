@extends('client.layout.master')

@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form method="post" action="{{ route('checkout.placeOrder') }}" id="checkoutForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="name" id="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Your Address" class="checkout__input__add" name="address"
                                    id="address">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" id="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="note"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span>
                                </div>
                                <ul>
                                    @php $totalPrice=0; @endphp
                                    @foreach ($cart as $item)
                                        @php
                                            $totalPrice += $item['price'] * $item['qty'];
                                        @endphp
                                        <li>{{ $item['name'] }}
                                            <span>${{ number_format($item['price'] * $item['qty'], 2) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal
                                    <span>${{ number_format($totalPrice, 2) }}</span>
                                </div>
                                <div class="checkout__order__total">Total <span>${{ number_format($totalPrice, 2) }}</span>
                                </div>

                                <div class="checkout__input__checkbox">
                                    <label for="cod">
                                        Thanh toán trực tiếp
                                        <input type="checkbox" name="payment_method" id="cod" value="cod">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="VNBANK">
                                        Thanh toán qua thẻ ATM/Tài khoản nội địa
                                        <input name="payment_method" type="checkbox" id="VNBANK" value="VNBANK">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="INTCARD">
                                        Thanh toán qua thẻ quốc tế
                                        <input name="payment_method" type="checkbox" id="INTCARD" value="INTCARD">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" id="placeOrder" class="clickButton">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection

@section('my-script')
    <script type="text/javascript">
        document.getElementById('checkoutForm').addEventListener('submit', function(event) {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;
            var checkboxes = document.querySelectorAll('input[name="payment_method"]:checked');

            if (!name || !address || !phone || !email) {
                event.preventDefault();
                Swal.fire('Please fill in all required fields.');
            } else if (checkboxes.length === 0) {
                event.preventDefault();
                Swal.fire('Please select a payment method.');
            }
        });
    </script>
@endsection

@extends('client.layout.master')

@section('content')
    <div class="order">
        <div class="container">
            <i onclick="handleBack()" class="fa-solid fa-angles-left back"></i>
            <form action="{{ route('sendInformOrder') }}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-lg-6 col-md-6">
                        <div class="inform">
                            <h2>Shipping Address</h2>
                            <div class="name">
                                <input type="text" name="first_name" placeholder="First Name"
                                    oninput="handleValue(event)" />
                                <input type="text" name="last_name" placeholder="Last Name"
                                    oninput="handleValue(event)" />
                            </div>
                            <div class="address">
                                <input type="email" name="email" placeholder="Your email"
                                    oninput="handleValue(event)" />
                                <input type="text" name="address" placeholder="Address" oninput="handleValue(event)" />
                                <input type="text" name="city" placeholder="City/Town" oninput="handleValue(event)" />
                            </div>
                            <textarea name="note" cols="40" rows="10" placeholder="Note" oninput="handleValue(event)"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="cartOrder">
                            <h2>Your Order</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="thID">ID</th>
                                        <th>Name Product</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th class="thDelete">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($listCart)
                                        @foreach ($listCart as $item)
                                            <tr>
                                                <td class="thID">{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <img src="{{ asset($item->image_url) }}" alt="" />
                                                </td>
                                                <td>
                                                    <div class="plus-minus">
                                                        <input type="text" value="{{ $item->quantity }}" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="price">
                                                        @if ($item->discount === 0)
                                                            <span>{{ $item->price * $item->quantity }}.00 $</span>
                                                        @else
                                                            <span>
                                                                <div class="priceDiscount">
                                                                    {{ ($item->price - $item->price * ($item->discount / 100)) * $item->quantity }}.00
                                                                    $</div>
                                                            </span>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td class="thDelete">
                                                    <i class="fa-solid fa-trash"
                                                        onclick="handleChange({{ $item->id }}, 'delete')"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="total">
                            <div class="totalPrice">
                                <h3>
                                    Quantity: <span>{{ $listCart->sum('quantity') }}</span>
                                </h3>
                                <h3>
                                    Total:
                                    <span>
                                        {{ $listCart->reduce(function ($total, $item) {
                                            return $item->discount != 0
                                                ? $total + ($item->price - $item->price * ($item->discount / 100)) * $item->quantity
                                                : $total + $item->price * $item->quantity;
                                        }, 0) }}.00
                                        $
                                    </span>
                                </h3>
                            </div>
                            <button class="clickButton" type="submit">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

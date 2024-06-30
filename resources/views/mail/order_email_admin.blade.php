<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <div>
            Customer Email: {{ $order->user->email }}
        </div>
        <div>
            Customer Name: {{ $order->user->name }}
        </div>
        <div>
            Customer Phone: {{ $order->user->phone }}
        </div>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            @php
                $totalPrice = 0;
            @endphp
            $@foreach ($order->orderItems as $item)
                @php
                    $totalPrice += $item->price * $item->qty;
                @endphp
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $item->name }}</th>
                    <th>{{ $item->qty }}</th>
                    <th>{{ number_format($item->price * $item->qty, 2) }}</th>
                </tr>
            @endforeach
        </table>
        <tr>
            <td>Total: </td>
            <td colspan="3">{{ $totalPrice }}</td>
        </tr>
    </body>

    </html>

</body>

</html>

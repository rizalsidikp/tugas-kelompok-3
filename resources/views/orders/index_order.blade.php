<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>

<body>

    @foreach ($orders as $order)
        <p>ID: {{ $order->id }}</p>
        <p>User: {{ $order->user->name }}</p>
        <p>Waktu: {{ $order->created_at }}</p>
        <p>
            @if ($order->confirmed == true)
                Terconfirm
            @else
                Unconfirm
                @if ($order->payment_receipt)
                    <a href="{{ asset('storage/images/payment/' . $order->payment_receipt) }}">Show Payment</a>
                @endif
                <form action="{{ route('confirm_payment', $order) }}" method="post">
                    @csrf
                    <button type="submit">Confirm</button>
                </form>
            @endif
        </p>
    @endforeach
</body>

</html>

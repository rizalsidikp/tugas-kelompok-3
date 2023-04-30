<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carts</title>
</head>

<body>
    @foreach ($carts as $cart)
        <img src="{{ asset('storage/images/' . $cart->product->gambar) }}" alt="" height="100px">
        <p>Nama: {{ $cart->product->nama }}</p>
        <p>Amount: {{ $cart->amount }}</p>
        <form action="{{ route('update_cart', $cart) }}" method="POST">
            @method('patch')
            @csrf
            <input type="number" name="amount" value={{ $cart->amount }}>
            <button type="submit"> Update Amount</button>
        </form>
        <form action="{{ route('delete_cart', $cart) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach

    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <button type="submit">Checkout</button>
    </form>
</body>

</html>

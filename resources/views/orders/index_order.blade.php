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
    @endforeach
</body>

</html>

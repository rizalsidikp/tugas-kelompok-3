<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->nama }}</title>
</head>

<body>
    <a href="{{ route('index_product') }}"> Kembali</a>
    <p>Nama: {{ $product->nama }} </p>
    <p>Deskripsi: {{ $product->deskripsi }} </p>
    <p>Jenis Barang: {{ $product->jenis_barang }} </p>
    <p>Stock: {{ $product->stock }} </p>
    <p>Harga Beli: Rp.{{ $product->harga_beli }} </p>
    <p>Harga Jual: Rp.{{ $product->harga_jual }} </p>
    <img src="{{ asset('storage/images/' . $product->gambar) }}" alt="" height="100px">
    <form action="{{ route('edit_product', $product) }}" method="GET">
        <button type="submit">Edit Product</button>
    </form>

    <form action="{{ route('add_to_cart', $product) }}" method="POST">
        @csrf
        <input type="number" name="amount" value=1>
        <button type="submit"> Add to Cart</button>
    </form>

</body>

</html>

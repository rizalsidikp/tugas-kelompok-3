<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{ $product->nama }}</title>
</head>

<body>
    <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <label for="">Nama Barang</label>
        <input type="text" name="nama" placeholder="nama" value="{{ $product->nama }}">
        <br>
        <label for="">Deskripsi</label>
        <input type="text" name="deskripsi" placeholder="deskripsi" value="{{ $product->deskripsi }}">
        <br>
        <label for="">Jenis Barang</label>
        <input type="text" name="jenis_barang" placeholder="jenis_barang" value="{{ $product->jenis_barang }}">
        <br>
        <label for="">Stock</label>
        <input type="text" name="stock" placeholder="stock" value={{ $product->stock }}>
        <br>
        <label for="">Harga Beli</label>
        <input type="text" name="harga_beli" placeholder="harga_beli" value={{ $product->harga_beli }}>
        <br>
        <label for="">Harga Jual</label>
        <input type="text" name="harga_jual" placeholder="harga_jual" value={{ $product->harga_jual }}>
        <br>
        <label for="">Upload Gambar</label>
        <input type="file" name="gambar">
        <br>
        <button type="submit">submit data</button>
    </form>

</body>

</html>

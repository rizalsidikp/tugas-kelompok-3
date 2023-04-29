@extends('app')
@section('title')
    Product
@endsection
@section('style')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama" placeholder="nama">
        <br>
        <input type="text" name="deskripsi" placeholder="deskripsi">
        <br>
        <input type="text" name="jenis_barang" placeholder="jenis_barang">
        <br>
        <input type="text" name="stock" placeholder="stock">
        <br>
        <input type="text" name="harga_beli" placeholder="harga_beli">
        <br>
        <input type="text" name="harga_jual" placeholder="harga_jual">
        <br>
        <input type="file" name="gambar">
        <br>
        <button type="submit">submit data</button>
    </form>
@endsection

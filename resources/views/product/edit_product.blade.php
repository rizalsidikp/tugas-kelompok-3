@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-title')
Edit {{ $product->nama }} -
@endsection
@section('layout-content')
<div class="row page-title">
    <div class="col-md-12">
        <h2>Edit Product - {{ $product->name }}</h2>
    </div>
</div>
<form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nama">Nama</label>
            <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama"
                value="{{ $product->nama }}">
        </div>
        <div class="col-md-6">
            <label for="deskripsi">Deskripsi</label>
            <input id="deskripsi" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi"
                value="{{ $product->deskripsi }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="jenis_barang">Jenis Barang</label>
            <input id="jenis_barang" type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang"
                value="{{ $product->jenis_barang }}">
        </div>
        <div class="col-md-6">
            <label for="stok">Stok</label>
            <input id="stok" type="text" class="form-control" name="stock" placeholder="Stok" value={{ $product->stock
            }}>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="harga_beli">Harga Beli</label>
            <input id="harga_beli" type="text" class="form-control" name="harga_beli" placeholder="Harga Beli" value={{
                $product->harga_beli }}>
        </div>
        <div class="col">
            <label for="harga_jual">Harga Jual</label>
            <input id="harga_jual" type="text" class="form-control" name="harga_jual" placeholder="Harga Jual" value={{
                $product->harga_jual }}>
        </div>
    </div>
    <div class="custom-file mb-3">
        <label for="gambar_product">Gambar Product</label><br />
        <input id="gambar_product" type="file" name="gambar">
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary">Edit Product</button>
    </div>
</form>
@endsection
@section('layout-scripts')
@endsection
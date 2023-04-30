@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-title')
{{ $product->nama }} -
@endsection
@section('layout-content')
<div class="row page-title">
    <div class="col-md-8">
        <h2>Add New Product</h2>
    </div>
    <div class="col-md-4 text-right">
        <form action="{{ route('index_product') }}"><button type="submit" class="btn btn-warning">Kembali</button>
        </form>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <p>Nama: {{ $product->nama }} </p>
    </div>
    <div class="col-md-6    ">
        <p>Deskripsi: {{ $product->deskripsi }} </p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <p>Jenis Barang: {{ $product->jenis_barang }} </p>
    </div>
    <div class="col-md-6">
        <p>Stock: {{ $product->stock }} </p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <p>Harga Beli: Rp.{{ $product->harga_beli }} </p>
    </div>
    <div class="col-md-6">
        <p>Harga Jual: Rp.{{ $product->harga_jual }} </p>
    </div>
</div>
<div class="mb-5 text-center">
    <img src="{{ asset('storage/images/' . $product->gambar) }}" alt="" height="100px">
</div>
<div class="row justify-end">
    <div class="col-md-auto">
        <form action="{{ route('edit_product', $product) }}" method="GET">
            <button type="submit" class="btn btn-primary">Edit Product</button>
        </form>
    </div>
    <div class="col-md-auto">
        <form action="{{ route('add_to_cart', $product) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-auto">
                    <input type="number" class="form-control" name="amount" value=1>
                </div>
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-info"> Add to Cart</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('layout-scripts')
@endsection
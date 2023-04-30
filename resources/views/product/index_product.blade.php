@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-content')
<div class="row page-title">
    <div class="col-md-8">
        <h2>List Product</h2>
    </div>
    <div class="col-md-4 text-right">
        <form action="{{ route('create_product') }}" method="get">
            <button type="submit" class="btn btn-primary">Add New Product</button>
        </form>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Stok</th>
            <th scope="col" class="text-center">Harga</th>
            <th scope="col" class="text-center">Gambar</th>
            <th scope="col" class="text-center" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($products) === 0)
        <tr>
            <td colspan="7" align="center">Data not found</td>
        </tr>
        @endif
        @foreach($products as $key => $product)
        <tr>
            <td align="center">{{ $key + 1 }}</th>
            <td>{{$product->nama}}</td>
            <td align="center">{{$product->stock}}</td>
            <td align="center">{{$product->harga_jual}}</td>
            <td align="center"><img src="{{ asset('storage/images/' . $product->gambar) }}" alt="" height="100px">
            </td>
            <td align="right">
                <form action="{{ route('show_product', $product) }}" method="GET">
                    <button type="submit" class="btn btn-info btn-sm">Show Detail</button>
                </form>
            </td>
            <td>
                <form action="{{ route('delete_product', $product) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"> Delete Product</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('layout-scripts')
@endsection
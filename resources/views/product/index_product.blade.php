@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-content')
<div class="row page-title">
    <div class="col-md-8">
        <h2>List Product</h2>
    </div>
    <div class="col-md-4 text-right">
        @if ($user->is_admin == true || $user->role == 'staff')
        <form action="{{ route('create_product') }}" method="get">
            <button type="submit" class="btn btn-primary">Add New Product</button>
        </form>
        @else
        @endif

    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Stok</th>
            @if ($user->is_admin == true || $user->role == 'staff' || $user->role == 'admin')
            <th scope="col" class="text-center">HPP</th>
            @endif
            <th scope="col" class="text-center">Harga</th>
            <th scope="col" class="text-center">Gambar</th>
            @if ($user->is_admin == true || $user->role == 'staff' || $user->role == 'admin')
            <th scope="col" class="text-center" colspan="3">Action</th>
            @else
            <th scope="col" class="text-center">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if (count($products) === 0)
        <tr>
            @if ($user->is_admin == true || $user->role == 'staff' || $user->role == 'admin')
            <td colspan="8" align="center">Data not found</td>
            @else
            <td colspan="6" align="center">Data not found</td>
            @endif
        </tr>
        @endif
        @foreach ($products as $key => $product)
        <tr>
            <td align="center">{{ $key + 1 }}</td>
            <td>{{ $product->nama }}</td>
            <td align="center">{{ $product->stock }}</td>
            @if ($user->is_admin == true || $user->role == 'staff' || $user->role == 'admin')
            <td align="center">{{ $product->harga_beli }}</td>
            @endif
            <td align="center">{{ $product->harga_jual }}</td>
            <td align="center"><img src="{{ asset('storage/images/' . $product->gambar) }}" alt="" height="100px">
            </td>
            <td align="center" style="width: fit-content;">
                <form action="{{ route('show_product', $product) }}" method="GET">
                    <button type="submit" class="btn btn-info btn-sm">Show Detail</button>
                </form>
            </td>
            @if ($user->is_admin == true || $user->role == 'staff' || $user->role == 'admin')
            <td align="center">
                <form action="{{ route('report_item_product', $product->id) }}" method="GET">
                    <button type="submit" class="btn btn-primary btn-sm"> Show Report</button>
                </form>
            </td>
            <td align="center">
                <form action="{{ route('delete_product', $product) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"> Delete Product</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('layout-scripts')
@endsection
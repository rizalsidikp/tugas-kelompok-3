<!DOCTYPE html>
<html lang="en">
@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-title')
My Chart -
@endsection
@section('layout-content')
<div class="row page-title">
    <div class="col-md-8">
        <h2>My Chart - List Product</h2>
    </div>
</div>
<table class="table table-striped mb-5">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Gambar</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Amount</th>
            <th scope="col" class="text-center" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($carts) === 0)
        <tr>
            <td colspan="6" align="center">Data not found</td>
        </tr>
        @endif
        @foreach ($carts as $key => $cart)
        <tr>
            <td align="center">{{ $key + 1 }}</th>
            <td align="center"><img src="{{ asset('storage/images/' . $cart->product->gambar) }}" alt="" height="100px">
            </td>
            <td>{{$cart->product->nama}}</td>
            <td align="center">{{$cart->amount}}</td>
            <td align="right">
                <form action="{{ route('update_cart', $cart) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="row justify-end">
                        <div class="col-md-auto no-padding">
                            <input type="number" name="amount" class="form-control-sm" value={{ $cart->amount }}>
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-success btn-sm"> Update Amount</button>
                        </div>
                    </div>
                </form>
            </td>
            <td>
                <form action="{{ route('delete_cart', $cart) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@if(count($carts) > 0)
<div class="row">
    <div class="col-md-12 text-right">
        <form action="{{ route('checkout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    </div>
</div>
@endif
@endsection
@section('layout-scripts')
@endsection
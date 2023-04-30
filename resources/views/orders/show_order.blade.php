@extends('layout/layout')
@section('layout-title')
Detail order ({{ $order->id }}) -
@endsection
@section('layout-content')
<div class="row page-title">
    <div class="col-md-8">
        <h2>Detail Order</h2>
    </div>
    <div class="col-md-4 text-right">
        <form action="{{ route('index_order') }}"><button type="submit" class="btn btn-warning">Kembali</button>
        </form>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <p>ID: {{ $order->id }}</p>
    </div>
    <div class="col-md-6">
        <p>User: {{ $order->user->name }}</p>
    </div>
</div>
<table class="table table-striped mb-5">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Product</th>
            <th scope="col" class="text-center">Amount</th>
        </tr>
    </thead>
    <tbody>
        @if(count($order->transactions) === 0)
        <tr>
            <td colspan="3" align="center">Data not found</td>
        </tr>
        @endif
        @foreach ($order->transactions as $key => $transaction)
        <tr>
            <td align="center">{{ $key + 1 }}</th>
            <td align="center">{{$transaction->product->nama}}</td>
            <td align="center">{{$transaction->amount}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@if ($order->is_paid == false && $order->payment_receipt == null)
<form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="payment_receipt">Upload payment receipt</label> <br />
    <input type="file" name="payment_receipt" id="payment_receipt" class="form-control-file btn">
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endif
@endsection
@section('layout-scripts')
@endsection
@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-content')
    <div class="row page-title">
        <div class="col-md-8">
            <h2>Order Management</h2>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Order ID</th>
                <th scope="col" class="text-center">User</th>
                <th scope="col" class="text-center">Waktu</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Payment</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($orders) === 0)
                <tr>
                    <td colspan="7" align="center">Data not found</td>
                </tr>
            @endif
            @foreach ($orders as $key => $order)
                <tr>
                    <td align="center">{{ $key + 1 }}</th>
                    <td align="center">{{ $order->id }}</td>
                    <td align="center">{{ $order->user->name }}</td>
                    <td align="center">{{ $order->created_at }}</td>
                    <td align="center">
                        @if ($order->confirmed == true)
                            Terconfirm
                        @else
                            Unconfirm
                        @endif
                    </td>
                    <td align="center">
                        @if ($order->payment_receipt)
                            <a href="{{ asset('storage/images/payment/' . $order->payment_receipt) }}" target="_blank">Show
                                Payment</a>
                        @else
                            -
                        @endif
                    </td>
                    <td align="center">
                        <div class="row justify-center">
                            <div class="col-md-auto">
                                <form action="{{ route('show_order', $order) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Show Order</button>
                                </form>
                            </div>
                            @if ($user->is_admin == true || $user->role == 'staff')
                                @if ($order->confirmed == false)
                                    <div class="col-md-auto">
                                        <form action="{{ route('confirm_payment', $order) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm">Confirm</button>
                                        </form>
                                    </div>
                                @endif
                            @else
                            @endif

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('layout-scripts')
@endsection

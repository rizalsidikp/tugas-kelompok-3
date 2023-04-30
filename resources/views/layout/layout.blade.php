@extends('app')
@section('title')
@yield('layout-title')
Product Management Application
@endsection
@section('style')
<link href="{{ asset('css/layout.css') }}" rel="stylesheet" />
@yield('layout-style')
@endsection
@section('content')
@if ($errors->any())
<div class="container-fluid position-absolute toast-alert">
    <div class="toast toast-error" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="fa fa-exclamation-circle" style="color: #dc3545; margin-right: 12px;" aria-hidden="true"></i>
            <strong class="mr-auto">Error</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="container-fluid">
    <div class="row min-vh-100">
        <div class="col-md-2 layout-sidebar">
            <h4>PMA - T2</h4>
            <div class="line"></div>
            <div class="menu-item" onclick="onClickMenu('/product')">Product</div>
            <div class="menu-item" onclick="onClickMenu('/order')">Order</div>
            <div class="menu-item">Customer</div>
            <div class="menu-item">User</div>
        </div>
        <div class="col-md-10 no-padding">
            <header>
                <div class="container-fluid layout-container text-center">
                    <div class="row">
                        <div class="col-md-6 text-left layout-title">
                            Hello, {{ $user->name }}
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="inline">
                                <form action="{{ route('show_cart') }}" method="get">
                                    <button type="submit" class="layout-logout">Carts</button>
                                </form>
                            </div>
                            <div class="inline">
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="layout-logout">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>

                        <style>
                            .inline {
                                display: inline-block;
                                margin-right: 10px;
                            }
                        </style>

                    </div>
                </div>
            </header>
            <div class="container layout-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content ">
                            @yield('layout-content')
                        </div>
                    </div>
                </div>
            </div>
            <footer class="layout-footer">
                <div class="container no-padding">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            &copy; 2023 Team 2 Web Programming
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function onClickMenu(link) {
        window.location = link;
    };
</script>
@yield('layout-scripts')
@endsection
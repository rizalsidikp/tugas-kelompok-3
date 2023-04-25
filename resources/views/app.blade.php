<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/opensans.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fa.css') }}" rel="stylesheet" />
    @yield('style')
    <link rel="shortcut icon" href="{{ asset('image/icon.png') }}" type="image/x-icon" />
</head>

<body data-spy="scroll" data-target="#navbar">
    @yield('content')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.toast').toast({ delay: 5000 }).toast('show');
        });
    </script>
    @yield('scripts')
</body>

</html>
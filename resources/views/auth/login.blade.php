<!-- resources/views/auth/login.blade.php -->
@extends('app')
@section('title')
Login
@endsection
@section('style')
<link href="{{ asset('css/login.css') }}" rel="stylesheet" />
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
@if(session('success'))
<div class="container-fluid position-absolute toast-alert">
  <div class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="fa fa-exclamation-circle" style="color: #28a745; margin-right: 12px;" aria-hidden="true"></i>
      <strong class="mr-auto">Success</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      {{ session('success') }}
    </div>
  </div>
</div>
@endif

<div class="container login-container">
  <div class="row justify-center">
    <div class="col-md-4 login-col">
      <div id="lg-bg-bk" class="login-background-back"></div>
      <div id="lg-bg" class="login-background"></div>
      <div id="lg-bg2-bk" class="login-background2-back"></div>
      <div id="lg-bg2" class="login-background2"></div>
      <div class="login-form">
        <h3 class="login-signin">Login to your account</h3>
        <form method="POST" action="{{ route('login.post') }}" class="login-form">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
          </div>
          <div class="login-separate">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <button id="login-btn" type="submit" class="btn btn-outline-primary full-width">
              Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
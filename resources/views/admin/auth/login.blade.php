@extends('admin.layouts.auth')
@section('pageTitle','LaraAdmin | Login')
@section('cssload')
<link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
<!-- endinject -->
<link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
@endsection
@section('maincontent')
<div class="col-lg-4 mx-auto">
  <div class="auth-form-light text-left py-5 px-4 px-sm-5">
    <!-- @if($errors->any())
    <ul class="error">
      @foreach($errors->all() as $error)
      <li> {{$error}}</li>
      @endforeach
    </ul>
    @endif -->
    @if($success=session('success'))
    <div class="alert alert-success alert-block">
      <strong>{{ $success }}</strong>
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <strong> {{$error}}</strong>
      @endforeach
</div>
    @endif
    @if ($message=session('error'))
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="brand-logo">
      <img src="{{asset('admin/images/logo-dark.svg')}}" alt="logo">
    </div>
    <h4>Hello! let's get started</h4>
    <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" method="post" action="/login-check">
      @csrf
      <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
      </div>
      <div class="my-2 d-flex justify-content-between align-items-center">
        <a href="/forgot-Password" class="auth-link text-black">Forgot password?</a>
      </div>

      <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="/register" class="text-primary">Create</a>
      </div>
    </form>
  </div>
</div>
@endsection
@section('jsload')
<!-- base:js -->
<script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/template.js')}}"></script>
<!-- endinject -->
@endsection
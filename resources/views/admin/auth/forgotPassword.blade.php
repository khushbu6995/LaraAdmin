@extends('admin.layouts.auth')
@section('pageTitle','LaraAdmin | Forgot Password')
@section('cssload')
<link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
<link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
@endsection
@section('maincontent')
<div class="col-lg-4 mx-auto">
  <div class="auth-form-light text-left py-5 px-4 px-sm-5">
    @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <strong> {{$error}}</strong>
      @endforeach
    </div>
    @endif
    @if($message = Session('error'))
    <div class="col-lg-12 mx-auto">
      <div class="alert alert-danger">
        <strong> {{$message}}</strong>
      </div>
    </div>
    @endif
    @if($message = Session('success'))
    <div class="col-lg-12 mx-auto">
      <div class="alert alert-success">
        <strong> {{$message}}</strong>
      </div>
    </div>
    @endif
    <div class="brand-logo">
      <img src="{{asset('admin/images/logo-dark.svg')}}" alt="logo">
    </div>
    <h4>Recover Password</h4>
    <h6 class="font-weight-light">Enter Email to Recover your Password.</h6>
    <form class="pt-3" method="post" action="/forgot-Password">
      @csrf
      <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">Send</button>
      </div>
      <div class="text-center mt-4 font-weight-light float-right">
        <a href="/login" class="text-primary">Login</a>
      </div>
    </form>
  </div>
</div>
@endsection
@section('jsload')
<script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/template.js')}}"></script>
@endsection
@extends('admin.layouts.auth')
@section('pageTitle','LaraAdmin | Reset Password')
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
    @if($success=session('success'))
    <div class="alert alert-success ">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $success }}</strong>
    </div>
    @endif
    <div class="brand-logo">
      <img src="{{asset('admin/images/logo-dark.svg')}}" alt="logo">
    </div>
    <h4>Reset Password</h4>
    <h6 class="font-weight-light">Email</h6>
    <form class="pt-3" method="post" action="/password-update">
      @csrf
      <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" name="confirmpassword">
        @error('confirmpassword')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">Save</button>
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
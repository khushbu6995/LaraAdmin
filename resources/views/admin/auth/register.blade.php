@extends('admin.layouts.auth')
@section('pageTitle','LaraAdmin | Register')
@section('cssload')
<!-- base:css -->
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
    @if($errors->any())
    <ul class="error">
      @foreach($errors->all() as $error)
      <li> {{$error}}</li>
      @endforeach
    </ul>
    @endif
    <div class="brand-logo">
      <img src="{{asset('admin/images/logo-dark.svg')}}" alt="logo">
    </div>
    <h4>New here?</h4>
    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
    <form class="pt-3" method="post" action="/registerCheck" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username" value="{{ old('username') }}">
      </div>
      <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}">
      </div>
    
      <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" name="confirmpassword">
      </div>
      <div class="form-group">
        <input type="text" class="form-control form-control-lg" id="exampleInputPhone1" placeholder="Phone" name="phone" value="{{ old('phone') }}">
      </div>
      <div class="form-group">
        <textarea class="form-control form-control-lg" id="exampleInputaddress1" placeholder="Your Address" name="address" value="{{ old('address') }}"></textarea>
      </div>
      <div class="form-group">
        <input type="file" class="form-control form-control-lg" id="exampleInputaddress1" placeholder="Add Profile Image" name="file" >
      </div>
      <div class="mb-4">
        <div class="form-check">
          <label class="form-check-label text-muted">
            <input type="checkbox" class="form-check-input">
            I agree to all Terms & Conditions
          </label>
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</button>
      </div>
      <div class="text-center mt-4 font-weight-light">
        Already have an account? <a href="/login" class="text-primary">Login</a>
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
@endsection
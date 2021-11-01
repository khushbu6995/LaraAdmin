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
    <div class="alert alert-success">
      @foreach($errors->all() as $error)
      <strong> {{$error}}</strong>
      @endforeach
    </div>
    @endif
    <div class="brand-logo">
      <img src="{{asset('admin/images/logo-dark.svg')}}" alt="logo">
    </div>
    <h4>New here?</h4>
    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
    <form class="pt-3" id="user-add-form" method="post" action="/register-Check" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="name" value="{{ old('name') }}" required>
        @error('name')
        <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
      </div>
      <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
      </div>

      <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
        @error('password')
        <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
      </div>
      <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" name="confirmpassword" required>
        @error('confirmpassword')
        <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
      </div>
      <div class="form-group">
        <input type="text" class="form-control form-control-lg" id="exampleInputPhone1" placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
        @error('phone')
        <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
      </div>
      <div class="form-group">
        <textarea class="form-control form-control-lg" id="exampleInputaddress1" placeholder="Your Address" name="address" value="{{ old('address') }}" required></textarea>
        @error('address')
        <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
      </div>
      <div class="form-group">
        <input type="file" class="form-control form-control-lg" id="exampleInputaddress1" placeholder="Add Profile Image" name="file" required>
        @error('address')
        <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
      </div>

      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" href="#">SIGN UP</button>
      </div>
      <div class="text-center mt-4 font-weight-light">
        Already have an account? <a href="/login" class="text-primary">Login</a>
      </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#user-add-form").validate({
      rules: {
        name: {
          'required': true,
        },
        email: {
          'required': true,
          'email': true,
        },
        phone: {
          'required': true,
        },
        password: {
          'required': true,
          'minlength': 6,
        },
        confirmPassword: {
          'required_with': 'password',
          'same': 'password',
          'minlength': 6,
        },
        address: {
          'required': true,
        },
        file: {
          'required': true,
          'file': true,
          'mimes': 'jpeg,png,jpg,gif,svg',
          'maxlength': 2048,
        }
      },
      messages:{
        name: {
          'required': "Enter Name",
        },
        email: {
          'required': "Enter Email",
          'email': "Enter Valid Email Detail",
        },
        phone: {
          'required': "Enter Phone",
        },
        password: {
          'required': "Enter Password",
          'minlength': "Passsword length should be atleast 6 ",
        },
        confirmPassword: {
          'required_with': "password should match",
          'same': '"please enter same password as password contain',
          'minlength': "Passsword length should be atleast 6",
        },
        address: {
          'required': "enter Address",
        },
        file: {
          'required': "select image",
          'file': 'select file',
          'mimes': 'image should be jpeg,png,jpg,gif,svg',
          'maxlength':"image length can't boigger than 2048",
        }
      }
    });
  });
</script>
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
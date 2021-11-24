@extends('admin.layouts.app')
@section('pageTitle','LaraAdmin | Add User')
@section('cssload')
<link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/jquery-bar-rating/fontawesome-stars-o.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/jquery-bar-rating/fontawesome-stars.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
<style>
  .w-5 {
    display: none;
  }
</style>
@endsection
@section('mainContent')
<div class="row">
  <div class="col-xl-12 d-flex grid-margin stretch-card">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        @if ($message = Session('error'))
        <div class="alert alert-danger alert-block">
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card-body">
          <h4 class="card-title">Add User</h4>
          <form class="forms-sample" id="user-add-form" method="post" action="/insert-User" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Confirm Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Password" required>
                    @error('confirmpassword')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Phone</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="address" value="{{ old('address') }}" placeholder="Address" required>{{ old('address') }}</textarea>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Profile Image</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" name="file" placeholder="Add Profile Image" required>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="/user-management1" class="btn btn-primary mr-2">Back To Users List</a>
          </form>
        </div>
      </div>
    </div>
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
      messages: {
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
          'maxlength': "image length can't boigger than 2048",
        }
      }
    });
  });
</script>
@endsection
@section('jsload')
<script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>
<script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('admin/js/dashboard.js') }}"></script>
@endsection
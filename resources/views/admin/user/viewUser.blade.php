@extends('admin.layouts.app')
@section('pageTitle','LaraAdmin | View User')
@section('cssload')
<!-- base:css -->
<link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/jquery-bar-rating/fontawesome-stars-o.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/jquery-bar-rating/fontawesome-stars.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<!-- endinject -->
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
                @if($errors->any())
                <ul class="error">
                    @foreach($errors->all() as $error)
                    <li> {{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card-body">
                    <h4 class="card-title">View User</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="#">
                    @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{$user->name}}" readonly> 
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" readonly>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Phone</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{$user->phone}}" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="address" placeholder="Address" readonly>{{$user->address}}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Profile Image</label>
                  <div class="col-sm-9">
                      <img src="{{asset('public/admin/profile_image/'.$user->image)}}" alt="user-profile-img" height="100" width="100" name="old_file">
                    </div>
                </div>
              </div>
            </div>
                        <a href="/user-management" class="btn btn-primary mr-2">Back To Users List</a>
                  
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('jsload')
<!-- base:js -->
<script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{ asset('admin/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
@endsection
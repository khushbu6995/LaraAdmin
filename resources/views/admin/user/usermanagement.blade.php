@extends('admin.layouts.app')
@section('pageTitle','LaraAdmin | User Management')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// $(document).ready(function(){
//   $("#search").on('keyup',function(){
//     alert("Mouse down over p1!");
//   });
// });
</script>
<style>
  .w-5 {
    display: none;
  }
  
</style>
@endsection
@section('mainContent')
<div class="row">
  <!-- <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, usermanagement!</h4>
            </div> -->


  <div class="col-xl-12 d-flex grid-margin stretch-card">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
      <div class="card-title">
      <form action="" method="">
            <input type="text" name="search" id="search" class="form-control searchboxstyle" placeholder="Search" >
            <button type="submit" class="btn btn-primary searchboxstyle btn-search">Submit</button>
            <a href="/usermanagement">
            <button  class="btn btn-light searchboxstyle btn-search">Reset</button></a>
          </form>
      </div>
        <div class="card-body">
          <div class="card-title">
          <h4 class="card-title float-left">Users List</h4>
          <a href="/adduserform" class="btn btn-info font-weight-bold float-right">+ Add New User</a>
          </div>
              
       
          <!-- <input type="text" name="search" id="search"> -->

          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <!-- <th>
                    #
                  </th> -->
                  <th>
                    User Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Action
                  </th>

                </tr>
              </thead>
              <tbody>
                <!-- @php($i=0) -->
                @foreach($users as $key => $user)
                <!-- @php($i++) -->
                <tr>
                 
                  <td>
                    {{$user->name}}
                  </td>
                  <td>
                  {{$user->email}}
                  </td>
                  <td>
                    <a href="/edituser/{{$user->id}}" class="icon-style icon-edit-style"><i class="icon-cog"></i></a>
                    <a href="/deleteuser/{{$user->id}}" onclick="return confirm('Are you sure?')" class="icon-style icon-delete-style"><i class="icon-delete"></i></a>
                    <a href="/viewuser/{{$user->id}}" class="icon-style icon-view-style"><i class="icon-file"></i></a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="pagignator-style">
            {{ $users->links() }}
          </div>
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
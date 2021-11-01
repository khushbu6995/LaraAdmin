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
<!-- modal -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<!-- modal over -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#search").on('input', function() {
      var search = $('search').val();
      if (serach != '') {
        // e.preventDefault();
        $.ajax({
          method: "post",
          url: "/user-management",
          data: {
            search: search
          },
          success: function(response) {
            console.log('done');
          }
        });
      }
    });
  });
</script>
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
        <div class="card-title">
          <form action="" method="">
            <input type="text" name="search" id="search" class="form-control searchboxstyle" placeholder="Search">

          </form>
        </div>
        <div class="card-body">
          @if($success=session('success'))
          <div class="alert alert-success ">
            <strong>{{ $success }}</strong>
          </div>
          @endif
          <h4 class="card-title float-left">Users List</h4>
          <a href="/add-user-form" class="btn btn-info font-weight-bold float-right">+ Add New User</a>

          <!-- <input type="text" name="search" id="search"> -->
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>

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

                @foreach($users as $key => $user)

                <tr>

                  <td>
                    {{$user->name}}
                  </td>
                  <td>
                    {{$user->email}}
                  </td>
                  <td>
                    <a href="/edit-user/{{$user->id}}" class="icon-style icon-edit-style"><i class="icon-cog"></i></a>



                    <a href="/delete-user/{{$user->id}}" onclick="return confirm('You Really want to delete this user?')" class="icon-style icon-delete-style"><i class="icon-delete"></i></a>

                    <a href="/view-user/{{$user->id}}" class="icon-style icon-view-style"><i class="icon-file"></i></a>
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
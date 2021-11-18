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

<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.jqueryui.min.js"></script>
<script>
  $(document).ready(function() {
    var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
      var clean_uri = uri.substring(0, uri.indexOf("?"));
      window.history.replaceState({}, document.title, clean_uri);
    }
    $("#search_data").click(function(event) {
      event.preventDefault();
      var search = $("#search").val();
      $.ajax({
        url: "/user-management?search="+search+"search_data",
        success: function(response) {
          console.log('done');
          // var table_data = JSON.parse(response);
          // var table = $('#getajaxData').DataTable( {
          //   data: table_data
          // var table=$("#getajaxData")
          // for(var i=0;i<response.length;i++)
          // {
          //   var row="<tr><td>${response[i].name}</td><td>${response[i].email}</td><td> <a href='/edit-user/${response[i].id}' class='icon-style icon-edit-style'><i class='icon-cog'></i></a><a href='/delete-user/${response[i].id}' onclick='return confirm('You Really want to delete this user?')'class='icon-style icon-delete-style'><i class='icon-delete'></i></a><a href='/view-user/${response[i].id}' class='icon-style icon-view-style'><i class='icon-file'></i></a></td><tr>";
          //   table.innerHTML +=row;
          // }
          // });
        }
      });
    });

    // $.ajax({
    //   url: "/user-management",
    //   // type: "get", //send it through get method
    //   data: {
    //     search: search,
    //   },
    //   success: function(response) {
    //     console.log('done');
    //   },
    // });

    // $.get('/user-management', search, success, jsonp)

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
            <!-- @csrf -->
            <input type="text" name="search" id="search" class="form-control searchboxstyle" placeholder="Search">
            <button name="search_data" id="search_data" class="btn btn-info font-weight-bold mt-3">Search</button>
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
              <tbody id="getajaxData">

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
@extends('admin.layouts.app')
@section('pageTitle','LaraAdmin | User Management')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
          <div class="table-responsive pt-3">
            <table class="table table-bordered" id="display_data">
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
              <tbody id="ajax_data_print">
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
      if (search != '') {
        $.ajax({
          url: "/user-management?search=" + search,
          success: function(response) {
            const users = response.data;
            console.log(users);
            var table = $('.table-responsive');
            var row = '';
            for (var i = 0; i < users.length; i++) {
              row += "<tr><td>" + users[i]['name'] + "</td>"
              row += "<td>" + users[i]['email'] + "</td>";
              row += "<td> <a href='/edit-user/" + users[i]['id'] + "' class='icon-style icon-edit-style'><i class='icon-cog'></i></a><a href='/delete-user/" + users[i]['id'] + "' onclick='return confirm('You Really want to delete this user?')'class='icon-style icon-delete-style'><i class='icon-delete'></i></a><a href='/view-user/" + users[i]['id'] + "' class='icon-style icon-view-style'><i class='icon-file'></i></a></td></tr>";
              $('.table-responsive tbody').html(row);
            }
          }
        });
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
@extends('admin.layouts.app')
@section('pageTitle','LaraAdmin | Dashboard')
@section('cssload')
<link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/jquery-bar-rating/fontawesome-stars-o.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/jquery-bar-rating/fontawesome-stars.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/clock.css') }}">
  @endsection
  @section('mainContent')
 <div class="row">
  <div class="col-xl-12 d-flex grid-margin stretch-card">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title float-left">Latest Users List</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    User Name
                  </th>
                </tr>
              </thead>
              <tbody>
                @php($i=0)
                @foreach($users as $key => $user)
                @php($i++)
                <tr>
                  <td>
                    {{$i}}
                  </td>
                  <td>
                    {{$user->name}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
    </div>
  </div>

  @endsection
  @section('jsload')
    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('admin/js/template.js') }}"></script>
  <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
  <script src="{{ asset('admin/js/dashboard.js') }}"></script>
  <script src="{{ asset('admin/js/clock.js') }}"></script>
  @endsection
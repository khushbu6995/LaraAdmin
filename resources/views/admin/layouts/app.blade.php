<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('pageTitle')</title>
  @yield('cssload')
</head>

<body>
  <div class="container-scroller">
    @include('admin.layouts.navbar')
    <div class="container-fluid page-body-wrapper pl-0" style="margin-left: 0 !important;">
      @include('admin.layouts.slidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('mainContent')
        </div>
        @include('admin.layouts.footer')
      </div>
    </div>
  </div>
  @yield('jsload')
</body>

</html>
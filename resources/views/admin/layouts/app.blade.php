<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('pageTitle')</title>
  @yield('cssload')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layouts.slidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        @yield('mainContent')
          <!-- <div class="row mt-5">
            
            <div class="col-xl-9 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Website Audience Metrics</h4>
                      <div class="row">
                        <div class="col-lg-5">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit amet cumque cupiditate</p>
                        </div>
                        <div class="col-lg-7">
                          <div class="chart-legends d-lg-block d-none" id="chart-legends"></div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <canvas id="web-audience-metrics-satacked" class="mt-3"></canvas>
                          </div>
                      </div>
                        
                    </div>
                  </div>
            </div>
          </div> -->
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layouts.footer')
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

@yield('jsload')
</body>

</html>


@include('partials.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     @include('partials.slidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
      
          
          <div class="row">
            <div class="col-xl-9 grid-margin-lg-0 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Top Sellers</h4>
                    <div class="table-responsive mt-3">
                      <table class="table table-header-bg">
                        <thead>
                          <tr>
                            <th>
                                Country
                            </th>
                            <th>
                                Revenue
                            </th>
                            <th>
                                Vs Last Month
                            </th>
                            <th>
                                Goal Reached
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-us mr-2" title="us" id="us"></i> United States 
                            </td>
                            <td>
                              $911,200
                            </td>
                            <td>
                              <div class="text-success"><i class="icon-arrow-up mr-2"></i>+60%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  25%
                                </div>
                              </div>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-at mr-2" title="us" id="at"></i> Austria
                            </td>
                            <td>
                                $821,600
                            </td>
                            <td>
                              <div class="text-danger"><i class="icon-arrow-down mr-2"></i>-40%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  50%
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-fr mr-2" title="us" id="fr"></i> France
                            </td>
                            <td>
                                $323,700
                            </td>
                            <td>
                              <div class="text-success"><i class="icon-arrow-up mr-2"></i>+40%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  10%
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <i class="flag-icon flag-icon-de mr-2" title="us" id="de"></i> Germany
                            </td>
                            <td>
                                $833,205
                            </td>
                            <td>
                              <div class="text-danger"><i class="icon-arrow-down mr-2"></i>-80%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  70%
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="pb-0">
                              <i class="flag-icon flag-icon-ae mr-2" title="ae" id="ae"></i> united arab emirates
                            </td>
                            <td class="pb-0">
                                $232,243
                            </td>
                            <td class="pb-0">
                              <div class="text-success"><i class="icon-arrow-up mr-2"></i>+80%</div>
                            </td>
                            <td class="pb-0">
                              <div class="row">
                                <div class="col-sm-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                  0%
                                </div>
                              </div>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       @include('partials.footer')
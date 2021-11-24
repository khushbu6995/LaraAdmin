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


<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->


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
            <input type="text" name="search" id="search"  class="form-control searchboxstyle">
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
            <table class="table table-bordered" id="display_data" data-page-length="3" data-order="[[ 2, 'asc' ]]">
              <thead>
                <tr>
                  <th class="user_sorting" data-name="name" data-order="asc" style="cursor: pointer;">
                    User Name
                  </th >
                  <th class="user_sorting" data-name="email" data-sorting_types="asc" style="cursor: pointer;">
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
                    <a href="/delete-user/{{$user->id}}" onclick="return confirm('You Really want to delete this user?')" class="icon-style icon-delete-style"><i class="icon-circle-cross"></i></a>
                    <a href="/view-user/{{$user->id}}" class="icon-style icon-view-style"><i class="icon-file"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <input type="hidden" name="hidden_name" id="hidden_column_name" value="id">
          <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc">
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
            // console.log(users);
            var table = $('.table-responsive');
            var row = '';
            for (var i = 0; i < users.length; i++) {
              row += "<tr><td>" + users[i]['name'] + "</td>"
              row += "<td>" + users[i]['email'] + "</td>";
              row += "<td> <a href='/edit-user/" + users[i]['id'] + "' class='icon-style icon-edit-style'><i class='icon-cog'></i></a><a href='/delete-user/" + users[i]['id'] + "' onclick='return confirm('You Really want to delete this user?')'class='icon-style icon-delete-style'><i class='icon-delete'></i></a><a href='/view-user/" + users[i]['id'] + "' class='icon-style icon-view-style'><i class='icon-file'></i></a></td></tr>";
            }
            $('.table-responsive tbody').html(row);
          }
        });
      }
    });



    // function fetch_data(sort_type='',column_name='')
    // {
    //   $.ajax({
    //     url:"sort-data?sortby="+column_name+"&sorttype="+sort_type,
    //     success:function(data){
    //       $('.table-responsive tbody').html(data);
    //     }
    //   });
    // }
    // $(document).on('click',function(){
    //   var column_name=$(this).data("name");
    //   var order_type=$(this).data("order");
    //   alert(order_type);
      // var reverse_order='';
      // if(order_type=="asc")
      // {
      //   $(this).data("sorting_type","desc");
      //   reverse_order="desc";
      // }
      // else{
      //   $(this).data("sorting_type","asc");
      //   reverse_order="asc";
      // }
      // $("hidden_column_name").val(column_name);
      // $("hidden_sort_type").val(reverse_order);
      // fetch_data(reverse_order,column_name);
    // });



// $('th').on('click',function(e){
//   e.preventDefault();
//   var column=$(this).data("column");
//   var order=$(this).data("order");
//   if(order == "asc")
//   {
//     $(this).data('order',"desc");
//   }else
//   {
//     $(this).data('order',"asc");
//   }
//   // alert(order);
//   $.ajax({
//     url:"/sort-data",
//         method:"post",
//         data:{
//           column:column,order:order,_token: '{{csrf_token()}}',
//         },
//         success:function(response)
//         {
//         const users = response.data;
//             // console.log(users);
//             var table = $('.table-responsive');
//             var row = '';
//             for (var i = 0; i < users.length; i++) {
//               row += "<tr><td>" + users[i]['name'] + "</td>"
//               row += "<td>" + users[i]['email'] + "</td>";
//               row += "<td> <a href='/edit-user/" + users[i]['id'] + "' class='icon-style icon-edit-style'><i class='icon-cog'></i></a><a href='/delete-user/" + users[i]['id'] + "' onclick='return confirm('You Really want to delete this user?')'class='icon-style icon-delete-style'><i class='icon-delete'></i></a><a href='/view-user/" + users[i]['id'] + "' class='icon-style icon-view-style'><i class='icon-file'></i></a></td></tr>";
//             }
//             $('.table-responsive tbody').html(row);
          
          
//         }
//   });
//   // alert(column+" "+order);
// });
});

  // $(document).on('click','.column-sort',function(){
  //     var column_name=$(this).attr("id");
  //     var order=$(this).data("order");
  //     var arrow='';
  //     // <i class='far fa-arrow-alt-circle-down' style='font-size:24px'></i>
  //     // <i class='far fa-arrow-alt-circle-up' style='font-size:24px'></i>
  //     if(order=="asc")
  //     {
  //       arrow='&nbsp;<i class="far fa-arrow-alt-circle-up" style="font-size:24px"></i>';
  //     }
  //     else
  //     {
  //       arrow='&nbsp;<i class="far fa-arrow-alt-circle-down" style="font-size:24px"></i>';
  //     }
  //     $.ajax({
  //       url:"/sort-data",
  //       method:"post",
  //       data:{
  //         column_name:column_name,order:order
  //       },
  //       success:function(data)
  //       {
  //         console.log(data);
  //         // $('.table-responsive').html(data);
  //         // $('#'+column_name+'').append(arrow);
  //       }
  //     });
  // });


  // });
</script>
<script>
  //   $(document).ready(function() {
  //         $('#display_data').DataTable();

  //         $(function () {
  //   $('#dataTable').DataTable({
  //     "pageLength": 3,
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false
  //     });
  // });
  // $(function () {
  //       $('#dataTable').DataTable({
  //           "ajax": {
  //               "url": "https://reqres.in/api/unknown", /*Data source*/
  //               "dataSrc": "data", /*object that holds the data*/
  //           },
  //           columns: [
  //               { data: 'name' },
  //               { data: 'email' },
  //           ],
  //           "columnDefs": [{ /* default values for columns */
  //               "defaultContent": "-",
  //               "targets": "_all"
  //           }],
  //       });
  //   }); 
    // });
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> -->

<!-- <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> -->
@endsection
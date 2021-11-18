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
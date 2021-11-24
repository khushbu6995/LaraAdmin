<nav class="sidebar sidebar-offcanvas ml-0" id="sidebar">
  <div class="user-profile">
    <div class="user-image">
    <img src="{{asset('public/admin/profile_image/'.$user_image)}}">
    </div>
    <div class="user-name">
      {{session('email')}}
    </div>
  </div>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="icon-box menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-help menu-icon"></i>
        <span class="menu-title">User Management</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/add-user-form">Add User</a></li>
          <li class="nav-item"> <a class="nav-link" href="/user-management1">Users List</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="{{asset('admin/images/faces/face28.png')}}">
          </div>
          <div class="user-name">
              Developer
          </div>
          <div class="user-designation">
              Developer
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
            <a class="nav-link" href="/usermanagement">
              <i class="icon-help menu-icon"></i>
              <span class="menu-title">User Management</span>

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
                <li class="nav-item"> <a class="nav-link" href="/adduserform">Add User</a></li>
                <li class="nav-item"> <a class="nav-link" href="/usermanagement">Users List</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
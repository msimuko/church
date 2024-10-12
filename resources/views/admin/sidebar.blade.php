<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="{{ url('/redirect') }}"><img src="admin/assets/images/faces/sda3.png" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="{{ url('/redirect') }}"><img src="admin/assets/images/faces/sda4.png" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="admin/assets/images/faces/cross.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">Moses Simataa</h5>
            <span>Admin</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark square-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark square-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark square-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>

    <li class="nav-item menu-items {{ request()->is('/redirect') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/redirected') }}">
            <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('view_members') || request()->is('see_members') || request()->is('update_member/*')? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="{{ request()->is('view_members') || request()->is('see_members') ? 'true' : 'false' }}" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="fa-solid fa-users fa-3x"></i>
        </span>
        <span class="menu-title">Manage Members</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ request()->is('view_members') || request()->is('see_members') ? 'show' : '' }}" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ request()->is('view_members') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('view_members') }}">
              <i class="fa-solid fa-user"></i>&nbsp;Register Members
            </a>
          </li>

          <li class="nav-item {{ request()->is('see_members') || request()->is('update_member/*')? 'active' : '' }}">
            <a class="nav-link" href="{{ url('see_members') }}">
              <i class="fa-solid fa-eye"></i>&nbsp;View Members
            </a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item menu-items {{ request()->is('view_inventory') || request()->is('show_inventory') || request()->is('update_inventory/*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="{{ request()->is('view_inventory') || request()->is('show_inventory') || request()->is('update_inventory/*') ? 'true' : 'false' }}" aria-controls="auth">
        <span class="menu-icon">
          <i class="fa-solid fa-warehouse"></i>
        </span>
        <span class="menu-title">Inventory</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ request()->is('view_inventory') || request()->is('show_inventory') || request()->is('update_inventory/*') ? 'show' : '' }}" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ request()->is('view_inventory') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('view_inventory') }}">
              <i class="fa-solid fa-wrench"></i>&nbsp; Add Inventory
            </a>
          </li>

          <li class="nav-item {{ request()->is('show_inventory') || request()->is('update_inventory/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('show_inventory') }}">
              <i class="fa-solid fa-eye"></i>&nbsp;Show Inventory
            </a>
          </li>

        </ul>
      </div>
    </li>

     <li class="nav-item menu-items {{ request()->is('time_management') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('time_management') }}">
        <span class="menu-icon">
        <i class="fa-solid fa-clock fa-10x"></i>
        </span>
        <span class="menu-title">Time Management</span>
      </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('view_givings') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('view_givings') }}">
        <span class="menu-icon">
            <i class="fa-solid fa-sack-dollar"></i>
        </span>
        <span class="menu-title">Givings</span>
      </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('see_users') || request()->is('update_user/*')? 'active' : '' }}">
        <a class="nav-link" href="{{ url('see_users') }}">
          <span class="menu-icon">
              <i class="fa-solid fa-user"></i>
          </span>
          <span class="menu-title">Users</span>
        </a>
      </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
        <span class="menu-icon">
          <i class="mdi mdi-file-document-box"></i>
        </span>
        <span class="menu-title">Strategic Planning</span>
      </a>
    </li>

    <li class="nav-item menu-items {{ request()->is('human_resource') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('human_resource') }}">
          <span class="menu-icon">
              <i class="fa-solid fa-user"></i>
          </span>
          <span class="menu-title">Human Resource</span>
        </a>
      </li>
  </ul>
</nav>



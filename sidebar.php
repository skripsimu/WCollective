<!-- Sidebar -->
    <ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-smog"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">Reporting</div>
        <!-- <img src="img/logo.png"> -->
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <font size="2" color="gray">Dashboard</font>
      </div>

      <!-- Nav Item - User -->
      <li class="nav-item <?php if ($currentPage === "user") print('active')?>">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>

      <!-- Nav Item - Activity -->
      <li class="nav-item <?php if ($currentPage === "activity") print('active')?>">
        <a class="nav-link" href="activity.php">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Activity</span></a>
      </li>

      <!-- Nav Item - Activity -->
      <li class="nav-item <?php if ($currentPage === "activity_date") print('active')?>">
        <a class="nav-link" href="activity_date.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Activity / Date</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <font size="2" color="gray">Reporting</font>
      </div>

      <!-- Nav Item - membership -->
      <li class="nav-item <?php if ($currentPage === "membership") print('active')?>">
        <a class="nav-link" href="membership.php">
          <i class="fas fa-fw fa-layer-group"></i>
          <span>Membership</span></a>
      </li>

      <!-- Nav Item - User -->
      <li class="nav-item <?php if ($currentPage === "user_reporting") print('active')?>">
        <a class="nav-link" href="user_reporting.php">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>

      <!-- Nav Item - Activity -->
      <li class="nav-item <?php if ($currentPage === "activity_reporting") print('active')?>">
        <a class="nav-link" href="activity_reporting.php">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Activity</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

    </ul>
    <!-- End of Sidebar -->
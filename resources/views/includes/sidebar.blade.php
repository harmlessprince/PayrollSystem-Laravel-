<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/{{Auth::user()->role ?? ''}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-money-bill-wave-alt"></i>
    </div>
    <div class="sidebar-brand-text mx-3">payRoll<sup>v:0.1</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="/">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Pages
  </div>
  @if(Auth::check() && Auth::user()->role == 'admin')
  {{-- @if (Auth::user()->role == 'admin')  --}}
  <!-- Admin Link Menu Starts Here --->
  <!-- Nav Item - Employee Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employee" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-users"></i>
      <span>Employee</span>
    </a>
    <div id="employee" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/create-employee">Add Employee</a>
        <a class="collapse-item" href="/manage-employee">Manage Employee</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Department Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#department" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-warehouse"></i>
      <span>Department</span>
    </a>
    <div id="department" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/create-department">Create Department</a>
        <a class="collapse-item" href="/manage-department">Manage Department</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Attendance Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#attendance" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Attendance</span>
    </a>
    <div id="attendance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#">Daily Attendance</a>
        <a class="collapse-item" href="#">Attendance Report</a>
      </div>
    </div>
  </li>


  <!-- Nav Item - Leave Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leave" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-bed"></i>
      <span>Leave</span>
    </a>
    <div id="leave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#">Add Leave</a>
        <a class="collapse-item" href="#">Manage Leave</a>
      </div>
    </div>
  </li>


  <!-- Nav Item - Payroll Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payroll" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-money-check-alt"></i>
      <span>Payroll</span>
    </a>
    <div id="payroll" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#">Create Payslip</a>
        <a class="collapse-item" href="#">Payslip List</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Holiday Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#holiday" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-glass-cheers"></i>
      <span>Holiday</span>
    </a>
    <div id="holiday" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#">Add Holiday</a>
        <a class="collapse-item" href="#">Manage Holiday</a>
      </div>
    </div>
  </li>

     <!-- Nav Item - Configuration Collapse Menu -->
     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Settings </span>
      </a>
      <div id="settings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="/payroll/configuration">Configuration</a>
          <a class="collapse-item" href="#">Change Password</a>
        </div>
      </div>
    </li>
  <!-- Admin Link Menu Ends Here --->
  @else

  <!-- Employee Link Menu Starts Here --->
  <!-- Nav Item - Attendance Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="#" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Attendance</span>
    </a>
  </li>

  <!-- Nav Item - Leave Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leave" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Leave</span>
    </a>
    <div id="leave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#">Apply for Leave</a>
        <a class="collapse-item" href="#">Manage Leave</a>
      </div>
    </div>
  </li>




  <!-- Nav Item - Payslip Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="#" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Payslip</span>
    </a>
  </li>

  <!-- Nav Item - Holiday Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="#" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Holiday</span>
    </a>
  </li>
  @endif
  <!-- Employee Link Menu Ends Here --->
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
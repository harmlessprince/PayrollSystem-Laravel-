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
        <a class="collapse-item" href="/create-employee">Create Employee</a>
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
  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#attendance" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-Createress-book"></i>
      <span>Attendance</span>
    </a>
    <div id="attendance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/attendance/daily">Daily Attendance</a>
        <a class="collapse-item" href="/attendance/report">Attendance Report</a>
      </div>
    </div>
  </li> --}}


  <!-- Nav Item - Leave Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leave" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-bed"></i>
      <span>Leave</span>
    </a>
    <div id="leave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/create/leave">Create Leave</a>
        <a class="collapse-item" href="/manage/leaves">Manage Leave</a>
      </div>
    </div>
  </li>


  <!-- Nav Item - Allowance Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#allowance" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Allowance</span>
    </a>
    <div id="allowance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/create/allowance">Create Allowance</a>
        <a class="collapse-item" href="/manage/allowances">Manage Allowance</a>
      </div>
    </div>
  </li>


  <!-- Nav Item - Deduction Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#deduction" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Deduction</span>
    </a>
    <div id="deduction" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/create/deduction">Create Deduction</a>
        <a class="collapse-item" href="/manage/deductions">Manage Deduction</a>
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
        <a class="collapse-item" href="/payslips/create">Create Payslip</a>
        <a class="collapse-item" href="	/payslips">Payslip List</a>
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


  <!-- Nav Item - Leave Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leave" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-bed"></i>
      <span>Leave</span>
    </a>
    <div id="leave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/apply/for/leave">Apply for Leave</a>
        <a class="collapse-item" href="/show/leaves/{{Auth::id()}}">Manage Leave</a>
      </div>
    </div>
  </li>




  <!-- Nav Item - Payslip Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="/view/payslips" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-money-check-alt"></i>
      <span>Payslip</span>
    </a>
  </li>

  <!-- Nav Item - Holiday Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="#" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Settings</span>
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
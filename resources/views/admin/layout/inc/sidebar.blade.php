  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      @php
        $siteInformation = DB::table('site_info')
                            ->select('site_title', 'logo', 'phone', 'address')
                            ->first();
      @endphp
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset($siteInformation->logo ?? '') }}" alt="{{ $siteInformation->site_title ?? 'Blood Donation' }} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $siteInformation->site_title ?? "Blood Donation" }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link" id="dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Information</li>
          <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link" id="users">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.bloodRequest') }}" class="nav-link" id="bloodRequest">
                  <i class="nav-icon fas fa-user-clock"></i>
                  <p>
                    Blood Requests
                  </p>
                </a>
            </li>
          <li class="nav-item">
            <a href="{{ route('donors') }}" class="nav-link" id="donors">
              <i class="nav-icon fas fa-syringe"></i>
              <p>
                Blood Donors
              </p>
            </a>
          </li>
            <li class="nav-header">Setting & Customization</li>
            <li class="nav-item">
            <a href="{{ route('setting') }}" class="nav-link" id="setting">
              <i class="nav-icon fas fa-cog"></i>
              <p>
               Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

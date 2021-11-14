@include('admin.layout.inc.header')
@include('admin.layout.inc.preloader')
@include('admin.layout.inc.navbar')
@include('admin.layout.inc.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class='content-header'>
				      <div class='container-fluid'>
				        <div class='row mb-2'>
				          <div class='col-sm-6'>
				            <h1 class='m-0'>@yield('pageTitle', 'Dashboard')</h1>
				          </div>
				          <div class='col-sm-6'>
				            <ol class='breadcrumb float-sm-right'>
				              <li class='breadcrumb-item'><a href='/admin/'>Dashboard</a></li>
				              <li class='breadcrumb-item active'>@yield('pageTitle', 'Dashboard')</li>
				            </ol>
				          </div>
				        </div>
				      </div>
				    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('mainContent')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@yield('script', '')
@include('admin.layout.inc.footer')

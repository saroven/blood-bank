@extends('admin.layout.app')
@section('mainContent')
    <div class="row">
        <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ sizeof($data['users']) }}</h3>
                    <p>Registered User</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>
        <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ sizeof($data['activeRequest']) }}</h3>
                    <p>Active Blood Request</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-syringe"></i>
                  </div>
                  <a href="{{ route('dashboard.filterRequest', 'active') }}" class="small-box-footer">All Requests <i class="fas fa-arrow-circle-right"></i></a>
              </div>
        </div>
        <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ sizeof($data['resolveRequest']) }}</h3>
                    <p>Resolved Blood Request</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-syringe"></i>
                  </div>
                  <a href="{{ route('dashboard.filterRequest', 'resolved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
        </div>
    </div>
@endsection
@section('siteTitle', 'Dashboard Page')

@section('script')
    <script>
        navActive('dashboard');
    </script>
@endsection

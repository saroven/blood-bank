@extends('admin.layout.app')
@section('mainContent')
    <div class="row">
          <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ sizeof(\App\Models\User::all()) }}</h3>
                    <p>Registered User</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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

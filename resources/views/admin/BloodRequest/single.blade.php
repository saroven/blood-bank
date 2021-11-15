@extends('admin.layout.app')
@section('mainContent')
        @if(session()->has('error'))
            <x-error-message :message="session('error')" />
            @elseif(session()->has('success'))
            <x-success-message :message="session('success')" />
        @endif

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Show all requests.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>User Name</th>
                        <th>Mobile Number</th>
                        <th>Blood Group</th>
                        <th>District</th>
                        <th>Location</th>
                        <th>Number of bags</th>
                        <th>When Needed?</th>
                        <th>Why Needed?</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>

                      </tr>
                        <tr>
{{--                            @foreach($data as $item)--}}
{{--                                --}}
{{--                            @endforeach--}}
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->mobile }}</td>
                            <td>{{ $data->blood_group }}</td>
                            <td>{{ $data->district_name }}</td>
                            <td>{{ $data->location }}</td>
                            <td>{{ $data->number_of_bags }}</td>
                            <td>{{ $data->need_date }}</td>
                            <td>{{ $data->comment }}</td>
                        </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
@section('siteTitle', 'Blood Request ')
@section('pageTitle', 'Blood Request ')
@section('script')

    <script>
        navActive('bloodRequest');
    </script>

@endsection

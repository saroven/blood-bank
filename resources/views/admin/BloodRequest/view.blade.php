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
                      <th>Serial No.</th>
                      <th>Request Status</th>
                      <th>Blood Group</th>
                      <th>Number of Bags</th>
                      <th>Need Date</th>
                      <th>District</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                    @foreach($requests as $request)
                        <tr>
                            <td>@php echo $i; ++$i; @endphp</td>
                            <td> @if($request->status == 0)
                                        <span class="badge bg-danger">Active</span>
                                    @else
                                        <span class="badge bg-success">Resolved</span>
                                    @endif
                                </td>
                            <td>{{ $request->blood_group }}</td>
                            <td>{{ $request->number_of_bags }}</td>
                            <td>{{ date('l, j F Y', strtotime($request->need_date)) }}</td>
                            <td>{{ $request->district_name }}</td>
                            <td>
                                <a href="{{ route('bloodRequest.details', $request->id) }}" class="btn btn-primary">More Details</a>
                            </td>
                        </tr>
                    @endforeach
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

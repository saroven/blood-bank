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
                <h3 class="card-title">Details</h3>
                  <div class="text-right"><a class="btn btn-info" href="{{ route('dashboard.bloodRequest') }}">See all requests</a></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                            <tr>
                                <td class="text-bold">Request Status: </td>
                                <td> @if($data->status == 0)
                                        <span class="badge bg-danger">Active</span>
                                    @else
                                        <span class="badge bg-success">Resolved</span>
                                    @endif
                                </td>
                            </tr>                        <tr>
                            <td class="text-bold" style="width: 250px">Requester Name: </td>
                            <td>{{ $data->username }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Mobile Number: </td>
                                <td>{{ $data->mobile }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Blood Group: </td>
                                <td>{{ $data->blood_group }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">District: </td>
                                <td>{{ $data->district_name }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Need Location: </td>
                                <td>{{ $data->location }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Number of bags: </td>
                                <td>{{ $data->number_of_bags }}</td>
                            </tr>
                        <tr>
                                <td class="text-bold">Requested: </td>
                                <td>{{ date('l, j F Y', strtotime($data->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Need Date: </td>
                                <td>{{ date('l, j F Y', strtotime($data->need_date)) }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Note: </td>
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

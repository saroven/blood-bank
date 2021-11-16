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
                <h3 class="card-title">Donors List.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Name</th>
                      <th>Blood Group</th>
                      <th>Status</th>
                      <th>Donate Count</th>
                      <th>Last Donate</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                    @foreach($donors as $donor)
                        <tr>
                            <td>@php echo $i; ++$i; @endphp</td>
                            <td>{{ $donor->name }}</td>
                            <td>@if($donor->blood_group) {{ $donor->blood_group }} @else {{ "Not specified" }} @endif</td>
                            <td> @if($donor->donate_status == 0)
                                        <span class="badge bg-danger">Not Active</span>
                                    @else
                                        <span class="badge bg-success">Active</span>
                                    @endif
                                </td>
                            <td>{{ $donor->donate_count }}</td>
                            <td>@if($donor->last_donate) {{ date('l, j F Y', strtotime($donor->last_donate)) }} @else {{ "Not Donated yet" }} @endif</td>
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
@section('siteTitle', 'Donors ')
@section('pageTitle', 'Donors ')
@section('script')

    <script>
        navActive('donors');
    </script>

@endsection

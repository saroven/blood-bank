@extends('admin.layout.app')
@section('mainContent')
    @if(session()->has('error'))
        <x-error-message :message="session('error')" />
        @elseif(session()->has('success'))
        <x-success-message :message="session('success')" />
    @endif
    @if($data->status)
        <x-success-message m1="" message="This request has been resolved" />
    @endif
    <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update blood requests</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('bloodRequest.update', $data->id) }}">
                  @csrf
                  {{-- hidded field for requested data id --}}
                  <input type="hidden" name="request_id" value="{{ $data->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="requested_by">Requested By</label>
                        <input type="text" class="form-control" value="{{ $requested_by }}" disabled>
                    </div>
                  <div class="form-group">
                    <label for="donated_by">Donated By</label>
                      <select name="donated_by" id="donated_by" class="form-control @error('donated_by') is-invalid @enderror" required id="donated_by">
                              <option value="">Select Donor Name</option>
                          @foreach($users as $user)
                              <option value="{{ $user->id }}" @if($user->name == $donated_by) selected @endif>{{ $user->name }}</option>
                          @endforeach
                      </select>
                    @error('donated_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                  </div>
                    <div class="form-group">
                        <label for="donated_date">Donate Date</label>
                        <input type="date" name="donated_date" class="form-control @error('donated_date') is-invalid @enderror" value="{{ old('donated_date') ?? $data->donated_date }}" required autocomplete="donated_date">
                        @error('donated_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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

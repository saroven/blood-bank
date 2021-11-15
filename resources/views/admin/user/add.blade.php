@extends('admin.layout.app')
@section('mainContent')
    @if(session()->has('error'))
        <x-error-message :message="session('error')" />
        @elseif(session()->has('success'))
        <x-success-message :message="session('success')" />
    @endif
    <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('insertUser') }}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus id="name" placeholder="Enter name">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                  </div>
                    <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="Enter email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required autocomplete="password" id="password" placeholder="Password">
                    @error('password')
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
@section('siteTitle', 'Users ')
@section('pageTitle', 'Users ')
@section('script')

    <script>
        navActive('users');
    </script>

@endsection

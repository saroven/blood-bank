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
                <h3 class="card-title">Site Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('setting.update') }}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="site_title">Site Title</label>
                    <input type="text" name="site_title" class="form-control @error('site_title') is-invalid @enderror" value="{{ $siteInfo->site_title ?? old('site_title') }}" required autocomplete="site_title" id="site_title" placeholder="Site Title">
                    @error('site_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                  </div>
                    <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $siteInfo->email ?? old('email') }}" required autocomplete="email" id="email" placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $siteInfo->phone ?? old('phone') }}" required autocomplete="phone" id="phone" placeholder="Phone Number">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $siteInfo->address ?? old('address') }}" required autocomplete="address" id="address" placeholder="Address">
                    @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="logo">Site Logo</label> <br>
                      @php($logo = $siteInfo->logo ?? null)
                      @if($logo) <img src="{{ asset($siteInfo->logo) }}" height="120px" width="250px" alt="site_logo"> @endif
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="logo ">
                            <label class="custom-file-label" for="fileInput">Choose file</label>
                          </div>
                    </div>
                    </div>
                          @error('logo')
                          <span class="text-danger" style="font-weight: bolder; font-size: 80%"><strong>{{$errors->first('logo')}}</strong> </span>
                          @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
@section('siteTitle', 'Settings')

@section('script')
    <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bs-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        navActive('setting')
        $(function () {
          bsCustomFileInput.init();
        });
    </script>
@endsection

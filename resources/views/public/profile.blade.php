@extends('public.layout.app')
@section('main')

    <div class="single" style="margin-top: 150px;">
        <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center">
            @if(session()->has('error'))
                <x-error-message :message="session('error')" />
            @elseif(session()->has('success'))
                <x-success-message :message="session('success')" />
            @endif
            <h4 class="mb-2">Profile</h4>
                <span><a href="{{ route('public.myBloodRequests') }}">My Blood Requests</a> |
                    <a href="#">Donated Bloods</a>  |
                    <a href="{{ route('public.receivedBloodRequests') }}">Received Blood Requests</a>
                </span><br>
            <form class="mt-2" method="POST" action="{{ route('public.profile.update') }}" accept-charset="UTF-8" id="regiForm" novalidate="">
                @csrf
                <div class="form-group">
                    <label class="control-label">Name<span>*</span></label>
                    <input value="{{ old('name') ?? $userInfo->name }}" class="form-control @error('name') is-invalid @enderror" name="name" type="text" required
                           placeholder="Full Name"/>
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Mobile Number (01XXXXXXXXX)<span>*</span></label>
                    <input value="{{ old('mobile') ?? '0'.$userInfo->mobile }}"
                           class="form-control is_number @error('mobile') is-invalid @enderror"
                           name="mobile" required type="number" minlength="10"
                           maxlength="13" min="0"
                           placeholder="Phone Number"/>
                    @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Gender<span>*</span></label>
                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option value="">Select Gender</option>
                        <option value="Male" @if(old('gender') == 'Male'|| $userInfo->gender == 'Male') selected @endif>Male</option>
                        <option value="Female" @if(old('gender') == 'Female' || $userInfo->gender == 'Female') selected @endif>Female</option>
                        <option value="Other" @if(old('gender') == 'Other' || $userInfo->gender == 'Other') selected @endif>Other</option>
                    </select>
                    @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Blood Group<span>*</span></label>
                    <select class="form-control @error('blood_group') is-invalid @enderror" name="blood_group">
                          <option value="">Select Blood Group</option>
                          <option value="A+" @if(old('blood_group') == 'A+' || $userInfo->blood_group == 'A+') selected @endif >A+</option>
                          <option value="A-" @if(old('blood_group') == 'A-' || $userInfo->blood_group == 'A-') selected @endif>A-</option>
                          <option value="B+" @if(old('blood_group') == 'B+' || $userInfo->blood_group == 'B+') selected @endif>B+</option>
                          <option value="B-" @if(old('blood_group') == 'B-' || $userInfo->blood_group == 'B-') selected @endif >B-</option>
                          <option value="AB+" @if(old('blood_group') == 'AB+' || $userInfo->blood_group == 'AB+') selected @endif >AB+</option>
                          <option value="AB-" @if(old('blood_group') == 'AB-' || $userInfo->blood_group == 'AB-') selected @endif >AB-</option>
                          <option value="O+" @if(old('blood_group') == 'O+' || $userInfo->blood_group == 'O+') selected @endif >O+</option>
                          <option value="O-" @if(old('blood_group') == 'O-' || $userInfo->blood_group == 'O-') selected @endif >O-</option>
                        </select>
                    @error('blood_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Birth Date</label>
                    <input type="date" value="{{ old('birth_date') ?? $userInfo->birth_date }}" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror">
                    @error('birth_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Donation Status<span>*</span></label>
                    <select name="donate_status" id="donate_status" class="form-control @error('donate_status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="0" @if(old('donate_status') == 0 || $userInfo->donate_status == 0) selected @endif>Not interested</option>
                        <option value="1" @if(old('donate_status') == 1 || $userInfo->donate_status == 1) selected @endif>Interested to donate</option>
                    </select>
                    @error('donate_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">District<span>*</span></label>
                    <select name="district" id="district" class="form-control @error('district') is-invalid @enderror">
                        <option value="">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" @if($district->id == old('district') || $userInfo->district_id == $district->id) selected @endif>{{ $district->name }}</option>
                        @endforeach
                    </select>
                    @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

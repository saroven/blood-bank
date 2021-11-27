@extends('public.layout.app')
@section('title', 'Blood Donation | Volunteer')
@section('main')
        <div class="single" style="margin-top: 150px">
            <div class="container">
                @if(session()->has('error'))
                <x-error-message :message="session('error')" />
            @elseif(session()->has('success'))
                <x-success-message :message="session('success')" />
            @endif
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="row">
                <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><strong>Blood Group:</strong> A+</li>
                    <li class="breadcrumb-item"><strong>Last Donated:</strong> 3 month ago</li>
                    <li class="breadcrumb-item"><strong>Total Donation:</strong> 100 Times</li>
                    <li class="breadcrumb-item"><strong>Location:</strong> Dhaka</li>
                  </ol>
                </nav>
            </div>
                <form action="{{route('public.sendBloodRequestToDonor', $userId)}}" method="post">
                        @csrf
                    <h3 class="m-4">Request for Blood</h3>
                      <div class="form-body">
                          <div class="form-group">
                              <label for="mobile">Mobile:</label>
                              <input type="tel" name="mobile" class="form-control" placeholder="Mobile" required>
                          </div>
                          <div class="form-group">
                              <label for="blood_group"><strong>Blood Group:</strong></label>
                              <select class="form-control" name="blood_group" required>
                                  <option value="">Select Blood Group</option>
                                  <option value="A+" >A+</option>
                                  <option value="A-" >A-</option>
                                  <option value="B+" >B+</option>
                                  <option value="B-" >B-</option>
                                  <option value="AB+">AB+</option>
                                  <option value="AB-">AB-</option>
                                  <option value="O+" >O+</option>
                                  <option value="O-" >O-</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="number_of_bag"><strong>Number of bag:</strong></label>
                              <input type="number" class="form-control" name="number_of_bag" placeholder="Number of bag">
                          </div>
                          <div class="form-group">
                              <label for="requestDate"><strong>Request Date:</strong></label>
                              <input type="date" class="form-control" name="need_date">
                          </div>
                          <div class="form-group">
                              <label for="district"><strong>District:</strong></label>
                              <select name="district" class="form-control">
                                  <option value="">Select District</option>
                                  @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="Location">Location</label>
                              <input type="text" placeholder="Location" name="location" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="comment"><strong>Reason for need blood:</strong></label>
                              <textarea class="form-control" name="comment" cols="15" rows="2" placeholder="Why need blood??"></textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
            </div>
        </div>
@endsection

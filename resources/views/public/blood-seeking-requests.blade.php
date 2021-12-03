    @extends('public.layout.app')
    @section('main')
        <div class="single" style="margin-top: 150px">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center mb-4">
                        <h5>All blood requests</h5>
                        <div class="new-organisation">
                            <button class="btn btn-outline-danger pull-right" data-toggle="modal" data-target="#addRequestModal">Request For Blood</button>
                        </div>
                    </div>
                    <div class="col-12">
        <div class="mt-2" style="width: 100%">


            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none">
                <span class="alert-success-message"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>

            <div class="col-sm-12 notice-bar-wrapper last_request">
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

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="single-wrapper">
                        <div class="box">
                            <div class="row">
                                @foreach($requests as $data)
                                    @php
                                        $donor_data = DB::table('blood_donation')
                                        ->join('user_details', 'blood_donation.donor_id', '=', 'user_details.user_id')
                                        ->select('blood_donation.request_id', 'blood_donation.requester_id', 'user_details.mobile')
                                        ->where('request_id', $data->request_id)
                                        ->first();
                                    @endphp
                                    <div class="col-sm-4">
                                        <div class="box-part text-center">
                                            <h5 class="blood-group" style="padding: 4px;">
                                                {{ $data->blood_group }}
                                            </h5>
                                            <div class="title">
                                                <h5>{{ $data->requester_name }}</h5>
                                                <i class="fa fa-phone"></i>
                                                @if(Auth::check())
                                                    <a href="#">{{ $data->mobile ? '+880'.$data->mobile : '' }}</a> <br>
                                                @else
                                                    <a href="#" title="To check number please login">+880XXXXXXXXXX</a> <br>
                                                @endif
                                                <small>District: {{ $data->district_name }}</small> <br>
                                                <small>Amount: {{ $data->number_of_bags.' bag' }}</small><br>
                                                <small>Need Date: {{ $data->need_date }}</small><br>
                                                <span>Status:
                                                    @php($donorRequestId = $donor_data->request_id ?? 0)
                                                    @php($requesterId = $donor_data->requester_id ?? 0)
                                                    @if($data->status == '0')

                                                    {{-- check if donor is requested to donate or not --}}
                                                        @if (
                                                            auth()->user()->id == $requesterId
                                                            &&
                                                            $donorRequestId == $data->request_id
                                                        )
                                                            <span class="badge badge-info">
                                                                Donor is waiting for call. Please call
                                                                {{ '0'.$donor_data->mobile }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-warning">
                                                                Waiting for Donor
                                                            </span>
                                                        @endif
                                                    @elseif($data->status != '0')
                                                        <span class="badge badge-success">Donated</span>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="text">
                                                Location: {{ $data->location }}
                                            </div>
                                            <div class="text">
                                                More Details: {{ $data->comment }}
                                            </div>
                                            <small class="text-muted">Requested: {{ \Carbon\Carbon::parse($data->request_date)->diffForHumans() }}</small>
                                            @php($username =  auth()->user()->name ?? '')
                                            @if($data->requester_name != $username)
                                                <a style="width:100%" href=" @if(!Auth::check()) {{ route('login') }} @else {{ route('public.donateBlood', $data->request_id) }} @endif " class="btn btn-outline-danger mt-2">Interested To Donate</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="pagination-wrapper">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addRequestModal" tabindex="-1" role="dialog" aria-labelledby="addRequestModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRequestModalLabel">Add Blood Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <form action="{{ route('public.AddBloodRequest') }}" method="post">
                    @csrf
                    <div class="modal-body">
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
    </div>
    @endsection

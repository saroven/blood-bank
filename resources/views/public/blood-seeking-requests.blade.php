    @extends('public.layout.app')
    @section('main')
                <div class="single" style="margin-top: 150px">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center mb-4">
                                <h5>All blood requests</h5>
                                <div class="new-organisation">
                                    <button class="btn btn-outline-danger pull-right" data-toggle="modal" data-target="#modal" onclick="loadModal('blood-seeking-post.html')">রক্তের জন্য রিকোয়েস্ট করুন</button>
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

            </div></div>

            <div class="col-sm-12 notice-bar-wrapper last_request">
                @if(session()->has('error'))
                <x-error-message :message="session('error')" />
            @elseif(session()->has('success'))
                <x-success-message :message="session('success')" />
            @endif
                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="single-wrapper">
                                    <div class="box">
                                        <div class="row">
                                            @foreach($requests as $data)
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
                                                                <span class="badge badge-warning">Waiting for Donor</span>
                                                            </span>
                                                        </div>
                                                        <div class="text">
                                                            More Details: {{ $data->comment }}
                                                        </div>
                                                        <small class="text-muted">Requested: {{ \Carbon\Carbon::parse($data->request_date)->diffForHumans() }}</small>
                                                        <a style="width:100%" href=" @if(!Auth::check()) {{ route('login') }} @else {{ route('public.donateBlood', $data->request_id) }} @endif " class="btn btn-outline-danger mt-2">Interested To Donate</a>
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
    @endsection

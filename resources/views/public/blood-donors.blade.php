@extends('public.layout.app')
@section('title', 'Blood Donation | Volunteer')
@section('main')
        <div class="single" style="margin-top: 150px">
        <div class="container">
            <div class="row">
                                 <div class="col-sm-12">
                    <form
                      action="/blood-donor"
                      class="check-form" method="get"
                    >
                      <div class="room-selector search-area">
                         <select class="form-control" name="district">
                          <option value="">Select Location</option>
                             @foreach($districts as $district)
                                 <option @if($oldDistrict == $district->id) selected @endif value="{{ $district->id }}">{{ $district->name }}</option>
                             @endforeach
                        </select>
                      </div>
                      <div class="room-selector search-blood">
                        <select class="form-control" name="blood_group">
                          <option value="">Select Blood Group</option>
                          <option value="A+" @if($oldBlood_group == 'A+') selected @endif >A+</option>
                          <option value="A-" @if($oldBlood_group == 'A-') selected @endif >A-</option>
                          <option value="B+" @if($oldBlood_group == 'B+') selected @endif >B+</option>
                          <option value="B-" @if($oldBlood_group == 'B-') selected @endif >B-</option>
                          <option value="AB+" @if($oldBlood_group == 'AB+') selected @endif >AB+</option>
                          <option value="AB-" @if($oldBlood_group == 'AB-') selected @endif >AB-</option>
                          <option value="O+" @if($oldBlood_group == 'O+') selected @endif >O+</option>
                          <option value="O-" @if($oldBlood_group == 'O-') selected @endif >O-</option>
                        </select>
                      </div>
                      <div class="room-selector search-btn">
                        <button
                          type="submit"
                          class="primary-btn"
                          title="Find Now"
                        >
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </form>
                  </div>

                <div class="col-sm-12 text-center mb-4">
                    <h5>List Donors</h5>
                </div>
            </div>
             <div class="row">
                        <div class="col-sm-12">
                            <div class="single-wrapper">
                                <div class="box">
                                    <div class="row">
                                        @foreach($searchData as $data)
                                            @php
                                                $now = time(); // or your date as well
                                                $last_donate = $data->last_donate ?? $now;
                                                $your_date = strtotime($last_donate);
                                                $datediff = $now - $your_date;
                                                $totalTime = round($datediff / (60 * 60 * 24));
                                            @endphp
                                            @if($totalTime < '90')
                                                @continue
                                            @endif
                                            <div class="col-sm-4">
                                                    <div class="box-part text-center">
                                                        <h5 class="blood-group" style="padding: 4px;">
                                                            {{ $data->blood_group }}
                                                        </h5>
                                                        <div class="title">
                                                            <h5>{{ $data->name }}</h5>
                                                            <i class="fa fa-phone"></i>
                                                            @if(Auth::check())
                                                                <a href="#">+880{{ $data->mobile }}</a> <br>
                                                            @else
                                                                <a href="#" title="To check number please login">+880XXXXXXXXXX</a> <br>
                                                            @endif
                                                            <small>Place: {{ $data->district_name }}</small> <br>
                                                            <small>Last Donate: {{ $data->last_donate }}</small> <br>
                                                            <span>Status:
                                                                     <span class="badge badge-warning">@php($status = $data->donate_status == 1 ? 'Available' : 'Not Available') {{ $status }}</span>
                                                            </span>
                                                        </div>
                                                        <a style="width:100%" href="@if(Auth::guest()) {{ route('login') }} @endif" class="btn btn-outline-danger mt-2" onclick="">Request for blood</a>
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

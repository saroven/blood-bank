@extends('public.layout.app')
@section('title', 'Blood Donation | Volunteer')
@section('main')
        <div class="single" style="margin-top: 150px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-4">
                    <h5>List of all volunteer</h5>
                    <div class="new-organisation">
                        <form action="/volunteer" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger pull-right">Filter</button>
                            <select class="form-control col-sm-3 mt-sm-10" id="areaFilter">
                                <option value="0">Area wise volunteer</option>
                                    <option value="115">Araihazar (আড়াইহাজার)</option>
                             </select>
                        </form>
                    </div>
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
                                            @if($totalTime > '90')
                                                @continue
                                            @endif
                                            <div class="col-sm-4">
                                                    <div class="box-part text-center">
                                                        <h5 class="blood-group" style="padding: 4px;">
                                                            {{ $data->blood_group }}
                                                        </h5>
                                                        <div class="title">
                                                            <h5>{{ $data->name }}</h5>
                                                            <i class="fa fa-phone"></i><a href="#" title="নাম্বার দেখতে দয়া করে লগইন করুন">+880XXXXXXXXXX</a> <br>
                                                            <small>Place: {{ $data->district_name }}</small> <br>
                                                            <small>Last Donate: {{ $data->last_donate }}</small> <br>
                                                            <span>Status:
                                                                     <span class="badge badge-warning">@php($status = $data->donate_status == 1 ? 'Available' : 'Not Available') {{ $status }}</span>
                                                            </span>
                                                        </div>
                                                        <a style="width:100%" href="#" class="btn btn-outline-danger mt-2" onclick="return confirmInterested(1018)">Request for blood</a>
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

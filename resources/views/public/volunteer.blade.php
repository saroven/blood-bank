@extends('public.layout.app')
@section('title', 'Blood Donation | Volunteer')
@section('main')
        <div class="single" style="margin-top: 150px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-4">
                    <h5>List of all volunteer</h5>
                    <div class="new-organisation">
                        <form action="{{ route('public.filterVolunteer') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger pull-right">Filter</button>
                            <select class="form-control col-sm-3 mt-sm-10" name="district" id="areaFilter">
                                <option>Area wise volunteer</option>
                                @php($old ?? $old = '')
                                @foreach($districts as $district)
                                    <option @if($old == $district->id) selected @endif value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
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
                                        @forelse ($volunteers as $volunteer)
                                            <div class="col-sm-4">
                                                <div class="box-part text-center">
                                                    <h5 class="blood-group" style="padding: 4px;">
                                                        O-
                                                    </h5>
                                                    <div class="title">
                                                        <h5>{{ $volunteer->name }}</h5>
                                                        <i class="fa fa-phone"></i>
                                                        @if(Auth::check())
                                                                <a href="#">{{ $volunteer->mobile ? '+880'.$volunteer->mobile : '' }}</a> <br>
                                                            @else
                                                                <a href="#" title="To check number please login">+880XXXXXXXXXX</a> <br>
                                                            @endif
                                                        <small>Place: {{ $volunteer->district_name }}</small> <br>
                                                        <small>Last Donate: {{ $volunteer->last_donate }}</small> <br>
                                                        <span>Status:
                                                            <span class="badge badge-warning">{{ $volunteer->donate_status = '1' ? 'Available' : 'Not Available' }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <h5>No volunteer found</h5>
                                        @endforelse
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

@extends('admin.layout.app')
@section('mainContent')
        @if(session()->has('error'))
            <x-error-message :message="session('error')" />
            @elseif(session()->has('success'))
            <x-success-message :message="session('success')" />
        @endif
    All blood request
@endsection
@section('siteTitle', 'Blood Request ')
@section('pageTitle', 'Blood Request ')
@section('script')

    <script>
        navActive('bloodRequest');
    </script>

@endsection

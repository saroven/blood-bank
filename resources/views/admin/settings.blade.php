@extends('admin.layout.app')
@section('mainContent')
    <h1>Hello</h1>
    @php
        $data = array(
            'title' => 'test table header',
            'header'=> array('Serial', 'Title', 'action'),
            'body' => array(1, 'Test Data', 'Test Action')
        );
    @endphp
    <x-data-table :datas="$data" />
@endsection
@section('siteTitle', 'Dashboard Page')

@section('script')
    <script>
        navActive('setting')
    </script>
@endsection

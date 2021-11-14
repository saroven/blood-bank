@extends('admin.layout.app')
@section('mainContent')
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 15%">Serial No.</th>
                      <th style="width: 65%">Category Name</th>
                      <th style="width: 20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>
                            <a href="{{ route('category.edit', 1) }}" class="btn btn-primary">EDIT</a>
                            <a href="{{ route('category.destroy', 1) }}" class="btn btn-danger">DELETE</a>
{{--                            <x-anchor-button text="EDIT" :link="route('category.edit', 1)" />--}}
{{--                            <x-anchor-button type="danger" text="DELETE" :link="route('category.destroy', 1)" />--}}
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
@section('siteTitle', 'Categories ')
@section('pageTitle', 'Categories ')
@section('script')
    <script>
        navActive('category');
    </script>
@endsection

@extends('admin.layout.app')
@section('mainContent')
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage all users.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 5%">Serial No.</th>
                      <th style="width: 40%">Name</th>
                      <th style="width: 40%">Email</th>
                      <th style="width: 15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                    @foreach($users as $user)
                        <tr>
                            <td>@php echo $i; ++$i; @endphp</td>
                            <td>@php echo $user['name'] @endphp</td>
                            <td>@php echo $user['email'] @endphp</td>
                            <td>
                                <a href="#" class="btn btn-primary">EDIT</a>
                                <a id="delete" href="#" class="btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
@section('siteTitle', 'Users ')
@section('pageTitle', 'Users ')
@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let deleteButton = document.getElementById('delete');
        console.log(deleteButton)
        navActive('users');
    </script>

@endsection

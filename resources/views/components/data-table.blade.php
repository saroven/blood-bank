<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $datas['title'] }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                        @php
                            $size = sizeof($datas['header']);
                            $size = round(100 / $size);
                        @endphp
                        @foreach($datas['header'] as $data)
                      <th style="width: {{ $size }}%">{{$data}}</th>

                        @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        @foreach($datas['body'] as $body)
                            <td>{{ $body }}</td>
                        @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

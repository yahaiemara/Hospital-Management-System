<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
   @include('admin.nav')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>date</th>
                        <th>status</th>
                        <th>department</th>
                        <th>massage</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($appoint as $data )
                      <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->department}}</td>
                        <td>{{$data->massage}}</td>
                        <td>
                            <a href="{{url('approved',$data->id)}}" class="btn btn-primary">Approved</a>
                            <a href="{{url('cancelled',$data->id)}}" class="btn btn-primary">Cancelled</a>

                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                </div>





            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>

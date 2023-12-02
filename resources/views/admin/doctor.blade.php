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
                            <th>phone</th>
                            <th>specialty</th>
                            <th>room</th>
                            <th>image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data )
                            <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->specialty}}</td>
                            <td>{{$data->room}}</td>
                            <td>
                                <img src="doctorimage/{{$data->image}}">
                            </td>
                            <td>
                                <a href="{{url('delete',$data->id)}}" class="btn btn-primary">Delete</a>
                            </td>
                            <td>
                                <a href="{{url('updatedoctor',$data->id)}}" class="btn btn-primary">Updata</a>
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

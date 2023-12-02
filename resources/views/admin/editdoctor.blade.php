<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
@include('admin.css')
<style>
    label{
       display: inline-block;
       width: 200px;
   }
  </style>
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
            <div class="content-wrapper" align="center"style="padding-top: 50px; ">

                @if(session()->has('massege'))
<div class="alert alert-success">
    <button class="close" type="button"  data-dismiss="alert">X</button>
    {{session()->get('massege')}}
</div>

                @endif
                <form action="{{url('edit',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
               <div style="padding:15px; ">
                <label>Doctor Name</label>
                <input type="text" value="{{$data->name}}" style="color: black;" name="name" placeholder="Write Your Name" required>
               </div>

               <div style="padding:15px; ">
                <label>Phone</label>
                <input type="number" value="{{$data->phone}}" style="color: black" name="phone"required  placeholder="Write Your Phone">
               </div>

               <div style="padding:15px; ">
                <label>Specialty</label>
                <select name="select" required style="color:black;width:200px;">
                    <option value="{{$data->specialty}}">{{$data->specialty}}</option>
                </select>
               </div>

               <div style="padding:15px; ">
                <label>Room</label>
                <input type="number" value="{{$data->room}}" required style="color: black" name="room" placeholder="Write Your Room Number">
               </div>
               <div style="padding:15px; ">
                <label>Doctor Image</label>
                <img src="doctorimage/{{$data->image}}" height="50px">
               </div>
               <div style="padding:15px; ">
                <label>Change Doctor Image</label>
                <input type="file" name="image">
               </div>
               <div style="padding:15px; ">

                <input type="submit" name="submit" class="btn btn-primary">
               </div>
                  </form>




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

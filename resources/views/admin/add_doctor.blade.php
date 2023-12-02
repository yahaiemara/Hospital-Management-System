<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   <style>
     label{
        display: inline-block;
        width: 200px;
    }
   </style>
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
            <div class="content-wrapper" align="center" style="padding-top: 50px;">
                @if(session()->has('massege'))
<div class="alert alert-success">
    <button class="close" type="button"  data-dismiss="alert">X</button>
    {{session()->get('massege')}}
</div>

                @endif

                <form action="{{url('Add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
               <div style="padding:15px; ">
                <label>Doctor Name</label>
                <input type="text" name="name" placeholder="Write Your Name" required>
               </div>

               <div style="padding:15px; ">
                <label>Phone</label>
                <input type="number"  style="color: black" name="phone"required  placeholder="Write Your Phone">
               </div>

               <div style="padding:15px; ">
                <label>Specialty</label>
                <select name="select" required style="color:black;width:200px;">
                    <option value="">---Select---</option>
                    <option value="skin">skin</option>
                    <option value="heart">heart</option>
                    <option value="eye">eye</option>
                    <option value="nose">nose</option>
                </select>
               </div>

               <div style="padding:15px; ">
                <label>Room</label>
                <input type="number" required style="color: black" name="room" placeholder="Write Your Room Number">
               </div>
               <div style="padding:15px; ">
                <label>Doctor Image</label>
                <input type="file"required  name="image">
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

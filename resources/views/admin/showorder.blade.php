

<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.css')
</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('admin.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
        @include('admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-1 px-3">
      <div class="container" >

        <div style="margin-top: 40px">
          <table class="table table-success table-striped" >
              <thead >
              <tr>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">Product Titel</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($order as $orders )
              <tr>
                  <td>{{$orders->name }}</td>
                  <td>{{$orders->phone }}</td>
                  <td>{{$orders->address }}</td>
                  <td>{{$orders->product_name }}</td>
                  <td>{{$orders->quantity }}</td>
                  <td>{{$orders->price }}</td>
                  <td>{{$orders->status }}</td>
                  <td><a class="btn btn-success" href="{{ url('updatestatus',$orders->id) }}">Deliverd</a></td>
                  
              </tr>
              @endforeach
              </tbody>
          </table>
      </div>
    </div>
  @include('admin.script')
</body>

</html>
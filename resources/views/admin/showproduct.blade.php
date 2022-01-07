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
            <div align="center">

                <h1>Show Product</h1>
            </div>
            @if(session()->has('message'))

            <div class="alert alert-success">
                
            <button type="button" class="close" data-dismiss="alert">X</button>

                {{session()->get('message')}}
            </div>
            @endif
                <div style="margin-top: 40px">
                    <table class="table table-success table-striped" >
                        <thead >
                        <tr>
                            <th scope="col">Titel</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product )
                        <tr>
                            <td>{{$product->titel }}</td>
                            <td>{{$product->discription }}</td>
                            <td>{{$product->quantity }}</td>
                            <td>{{$product->price }}</td>
                            <td><img height="50" width="50" src="/productimage/{{$product->image }}" alt=""></td>
                            <td><a href="{{url('updateview',$product->id)}}">
                                <button id="submit" name="submit" class="btn btn-primary">Update</button>
                            </a>
                            </td>
                            <td><a href="{{url('deleteproduct',$product->id)}}">
                                <button id="submit" name="submit" class="btn btn-danger">Delete</button>
                            </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

  @include('admin.script')
</body>

</html>
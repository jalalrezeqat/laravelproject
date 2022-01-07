
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .titel
        {
            font-size: 25px;
            margin: 20px;
        }
      
    </style>
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
                <h1 class="titel">Add Product </h1>
            </div>
            
            @if(session()->has('message'))

            <div class="alert alert-success">
                
            <button type="button" class="close" data-dismiss="alert">X</button>

                {{session()->get('message')}}
            </div>

            @endif
               
                <form class="form-horizontal"  action="{{url('uploadproduct')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
            
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="titel">Product Titel</label>  
                      <div class="col-md-4">
                      <input id="titel" name="titel" type="text" placeholder="Give a Product Titel" class="form-control input-md" required="">  
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="price">Price</label>  
                      <div class="col-md-4">
                      <input id="price" name="price" type="text" placeholder="Give a Product Price" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="quantity">Quantity</label>  
                      <div class="col-md-4">
                      <input id="quantity" name="quantity" type="text" placeholder="Give a Product Quantity" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="dicription">Discription</label>  
                      <div class="col-md-4">
                      <input id="dicription" name="dicription" type="text" placeholder="Give a Product Price" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- File Button --> 
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="file">upload Image</label>
                      <div class="col-md-4">
                        <input id="file" name="file" class="input-file" type="file">
                      </div>
                    </div>
                        <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                    </fieldset>
                    </form>
                    
    </div>
        
    </div>
  @include('admin.script')
</body>

</html>
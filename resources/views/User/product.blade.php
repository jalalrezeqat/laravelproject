<style>
  img
  {
    height:400px; width:150px;
  }
  .x
  {
    background-color: green;
    color: #fff;
  }
  .p
  {
    background-color: rgb(13, 72, 121);
    color: #fff;
  }
</style>

    <div class="latest-products">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Latest Products</h2>
                <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                         
                <form class="form-inline" action="{{url('search')}}" method="get" style="float: right">
                  @csrf
                  <input class="form-control" type="search" name="search" placeholder="Search">
                  <input style="margin-left: 5px" type="submit" value="Search" class="btn x">
                </form>
              </div>
            </div>
           
           @foreach ($data as $product)
             
           
            <div class="col-md-4">
              <div class="product-item">
                <a href="#"><img  src="/productimage/{{$product->image}}" alt=""></a>
                <div class="down-content">
                  <a href="#"><h4>{{$product->titel}}</h4></a>
                  <h6>${{$product->price}}</h6>
                  <p>{{$product->discription}}</p>
                  
                    <form action="{{ url('addcart',$product->id) }}" method="post">
                      @csrf
                      <input type="number" name="quantity" value="1" min="1" class="from-control" style="width:100px" >
                      <br>
                      <br>
                      <input type="submit" class="btn p" value="Add Cart">
                    </form>
                </div>
              </div>
            </div>
            @endforeach

            @if(method_exists($data ,'links'))
            <div class="s-flex justify-content-center">
              {!! $data->links() !!}
            </div>
            @endif
          </div>
        </div>
      </div>
{{-- @extends('layout')

@section('content')
    
    <div class="d-flex justify-content-center">{{ $products->links() }} </div>
    <div class="row">
        @foreach($products as $product)
        <div class="mb-4 product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="product-thumb transition">
        <div class="image mb-2"><a href="#"><img src="{{url('/profile_images/'.$product->photo_name)}}" class="img-thumbnail" /></a></div>
        <div class="caption">
        <h4><a href="#">{{$product->name}}</a></h4>
        <p>
        {{ str_limit( $product->description, 27, ' ...') }}</p>
        <p>Price - <span class="badge badge-success">$ {{  $product->price }}</span></p>
        <p>Quantity - <span class="badge badge-danger">{{ $product->quantity }}</span></p>
        </div>
        {{-- <div class="button-group">
        <button class="btn btn-dark" type="button" onclick="cart.add('40');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
        <button class="btn btn-dark" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('40');"><i class="fa fa-heart"></i></button>
        <button class="btn btn-dark" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('40');"><i class="fa fa-exchange-alt"></i></button>
        </div> 
        {{ Form::open(['url' => 'cart', 'method' => "POST"]) }}
                                <a href="{{ url('products', $product->id) }}" class="btn btn-dark">Detail</a>

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-dark"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
          {{ Form::close() }}
        </div>
        </div>
        @endforeach     
    </div>
  </div>
    
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/products/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
<link href="{{ asset('assets/products/css/shop-homepage.css') }}" rel="stylesheet">

</head>

<body>

  {{-- <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> --}}

  @extends('layouts.navbar')

  <!-- Page Content -->
  <div class="container" style="width:100%; margin:5px auto;">

    <div class="row p-3">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Categories</h1>
        <div class="list-group">
          @foreach ($categories as $category)
            <a href="/product/{{ $category->id }}" class="list-group-item">{{ $category->name }}</a>
          @endforeach
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-8">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{url('profile_images/p1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{url('profile_images/p2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{url('profile_images/p3.jpg')}}" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          @foreach($products as $product)

          <style>
            .product-img{
              width: 250px;
              height: 300px;
            }
          </style>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <a href="#"><img class="card-img-top product-img" src="{{url('/profile_images/'.$product->photo_name)}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{$product->name}}</a>
                </h4>
                <h5>{{  $product->price }} Kyats</h5>
                {{-- <h5>Quantity = {{  $product->quantity }} </h5> --}}
                <p class="card-text">{{ str_limit( $product->description, 20, ' ...') }}</p>
              </div>
              <div class="card-footer">
                {{ Form::open(['url' => 'cart', 'method' => "POST"]) }}
                                <a href="{{ url('products', $product->id) }}" class="btn btn-block btn-primary h6 ml-0 p-2">Detail</a>

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-block btn-primary h6 ml-0 p-2"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
          {{ Form::close() }}
          {{-- <div class="row">
            <button class="btn btn-block btn-primary rounded h6">Details</button>
            <button class="btn btn-block btn-primary rounded h6">Add to Cart</button>
          </div> --}}
              </div>
            </div>
          </div>

          @endforeach

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

      <div class="d-flex justify-content-center">{{ $products->links() }} </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  {{-- <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer> --}}

  <!-- Bootstrap core JavaScript -->
  <script src="products/vendor/jquery/jquery.min.js"></script>
  <script src="products/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

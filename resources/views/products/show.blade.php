{{-- @extends('layout')

@section('content')
    <h3>
        <a href="#">
            {{ $product->name }}
        </a>
    </h3>

    <p>
        {{ $product->description }}
    </p>
    <p>Price - <span class="badge badge-success">$ {{  $product->price }}</span></p>
    <p>Quantity - <span class="badge badge-danger">{{ $product->quantity }}</span></p>

    <ul>
        @foreach($product->categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    <hr>
    <a href="{{ url('products') }}" class="btn btn-primary">Products</a>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- for Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


    <script src="https://kit.fontawesome.com/8da23e008a.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
    <style>
        .proimg-size {
            width: 600px;
            height: 600px;
        }
    </style>
</head>

<body>

    <head class="">

        {{-- @extends('layouts.navbar') --}}
        <ul class="nav mt-3 ml-3">
            <li class="nav-item">
              <a class="btn btn-info" href="{{ url('/products')}}">Back</a>
            </li>
          </ul>
    </head>
    
    <div class="row mx-2 mt-5">
        <div class="col-sm-6 text-right">
            <img src="{{url('/profile_images/'.$product->photo_name)}}"
                class="img-fluid proimg-size" alt="">
        </div>
        <div class="col-sm-5 bg-white shadow">
            <div class="row mx-2 mt-4">
                <h3 class="">{{ $product->name }}</h3>
            </div>
            <div class="row mx-2">
                <p> {{ $product->price }} Kyats</p>
            </div>
            <div class="row mx-2 justify-content-center">
                <div class="accordion w-100" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Description
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" class="my-3">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputDescription">Color</label>
                            <select name="" id="" class="form-control">
                                <option value="">Red</option>
                                <option value="">Yellow</option>
                                <option value="">Green</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDescription">Size</label>
                            <select name="" id="" class="form-control">
                                <option value="">S</option>
                                <option value="">M</option>
                                <option value="">L</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row py-2">
                        <label>Quantity</label>
                        <div class="input-group form-group">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-outline-dark btn-number"
                                    data-type="minus" data-field="">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                value="10" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-outline-dark btn-number"
                                    data-type="plus" data-field="">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            {{ Form::open(['url' => 'cart', 'method' => "POST"]) }}

            <button class="btn btn-primary btn-block">Add To Cart</button>

                <input type="hidden" name="product_id" value="{{ $product->id }}">
          {{ Form::close() }}
            {{-- <div class="row px-3 pb-4">
                <button class="btn btn-primary btn-block">Add To Cart</button>
            </div> --}}
        </div>
    </div>
</body>

</html>
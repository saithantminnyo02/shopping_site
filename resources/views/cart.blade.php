{{-- @extends('layout') --}}
@extends('layouts.navbar')

@section('content')
       <div class="container mt-5">
        <h3>Shopping Cart</h3>

        <hr>
    
        <table class="table table-striped table-dark">
            <tr>
                <td>No.</td>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            @php
                $total = 0;
                $id = 1;
            @endphp

            @foreach($cart_list as $product)
    
                <tr>
                <td>{{ $id  }}</td>
                    <td>{{ $product->name }}</td>
                    <td>1
                        </td>
                        <td>{{ $product->price / 100 }} Kyats</td>
                        <td>

                            {{ Form::open(['method' => 'DELETE','route' => ['cart.destroy', $product->rowId]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn-xs btn-secondary']) }}
                {{ Form::close() }}
                        </td>
                </tr>

                @php
                    $total += $product->price;
                    $id += 1;
                @endphp
                
            @endforeach
    
            <tr>
                <td></td>
                <td>Total</td>
                <td></td>
                <td>{{ $total / 100 }} Kyats</td>
                <td></td>
            </tr>
        </table>
    
            <form method="POST" role="form" action="{{route('charge', [$total])}}">
    
            {{ csrf_field() }}
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_ILTHx2YCYNIfOzFVLH78JTwZ00jlcSn0Z7"
                data-email="{{ Auth::user()->email }}"
                data-amount="{{ $total }}"
                data-name="Online Shopping"
                data-description="Paywith Card"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="mmk">
            </script>
        </form>

        {{-- <button class="btn btn-block btn-primary h6 ml-0 p-2"> Cash on Delivery</button> --}}
        <a href="/cashOnDelivery" type="submit" class="stripe-button-el mt-2" style="visibility: visible;"><span style="display: block; min-height: 30px;">Cash on Delivery</span></a>
       </div>
@endsection
@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-3 mb-3">
        <h3>Category Name = {{ $category->name }}</h3>
    <p>

    </p>

    <h4>Related Products</h4>

    <ul>
        @foreach($category->products as $product)
            <li><a href="/products/{{ $product->id }}">{{ $product->name }}</a> ({{ $product->description }})</li>
        @endforeach
    </ul>
    </div>
@endsection